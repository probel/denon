<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumn;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use \App\Models\ProductPrice;
/**
 * Class Product
 *
 * @property \App\Models\Product $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Product extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Товары';
        $this->icon = 'fa fa-product-hunt';
        $this->created(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            $this->setPrices($model);
            $this->setAlts($model);
            $this->setSlug($model);
            //$this->OptimizerChain($model);
        });
        $this->updated(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            $this->setPrices($model);
            $this->setAlts($model);
            $this->setSlug($model);
            //$this->optimizerChain($model);
        });

    }
    private function setPrices(&$model)
    {
        if (request()->prices) {
            $prices_id = [];
            foreach (request()->prices as $county_id => $price) {
                $pr = ProductPrice::firstOrNew(['country_id' => $county_id, 'product_id' => $model->id,'qty'=>1]);
                $pr->price = $price;
                $pr->save();
                $prices_id[] = $pr->id;
            }
            ProductPrice::where('product_id',$model->id)->where('qty',1)->whereNotIn('id',$prices_id)->delete();
        }
        if (request()->prices_old) {
            $prices_id = [];
            foreach (request()->prices_old as $county_id => $price) {
                $pr = ProductPrice::firstOrNew(['country_id' => $county_id, 'product_id' => $model->id,'qty'=>0]);
                $pr->price = $price;
                $pr->save();
                $prices_id[] = $pr->id;
            }
            ProductPrice::where('product_id',$model->id)->where('qty',0)->whereNotIn('id',$prices_id)->delete();
        }
        if (request()->prices_opt) {
            $prices_id = [];
            foreach (request()->prices_opt as $county_id => $qtys) {
                foreach ($qtys as $qty => $price) {
                    if ($price) {
                        $pr = ProductPrice::firstOrNew(['country_id' => $county_id, 'product_id' => $model->id,'qty'=>$qty]);
                        $pr->price = $price;
                        $pr->save();
                        $prices_id[] = $pr->id;
                    }
                }
            }
            ProductPrice::where('product_id',$model->id)->where('qty','>',1)->whereNotIn('id',$prices_id)->delete();
        }
    }
    private function optimizerChain($model)
    {
        foreach ($model->images as $image) {
            if (file_exists(public_path($image))) {
                app(\Spatie\ImageOptimizer\OptimizerChain::class)->optimize(public_path($image));
            }
        }
    }
    private function setAlts(&$model)
    {
        $alts = explode("\n",$model->image_alts);
        foreach ($model->images ?? [] as $key => $image) {
            $alt = trim(strip_tags($alts[$key] ?? null));
            if (!$alt) {
                $alt = trim(strip_tags($model->name));
                if ($key) {
                    $alt .= ' - '.($key+1);
                }
                $alts[$key] = $alt;
            }
        }
        $alts = array_slice($alts,0,count($model->images));
        $model->image_alts = implode("\n",$alts);
        $model->save();
    }

    private function setSlug(&$model)
    {
        $i = 0;
        while(true) {
            $slug = $model->slug ? $model->slug : Str::slug($model->name, '-');
            if ($i) {
                $slug .= '_'.$i;
            }
            $is = \App\Models\Product::where('slug', $slug)->where('id', '!=', $model->id)->first();
            $i++;
            if (!$is) {
                break;
            }
        }
        if (!$model->slug || $i) {
            $model->slug = $slug;
            $model->save();
        }
    }
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;
    public function can($action, Model $model)
    {
        return \Auth::user()->isAdmin();
    }

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias;

    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {

        $display = AdminDisplay::datatables()

            ->setApply(function ($query)  {
                //dd($request->all());
                //$query->orderBy('order', 'asc');
            })
            ->setOrder([[9, 'asc']])
            ->setColumns([
                AdminColumn::custom('Название', function(\Illuminate\Database\Eloquent\Model $model) {
                    return '<a href="'.$model->getUrl().'" target="_blank">'.$model->name.'</a>';
                })->setOrderable(function($query, $direction) {
                    $query->orderBy('name', $direction);
                })->setSearchable(true)->setSearchCallback(function ($column, $query, $search) {
                    return $query->where('name', 'like', '%' . $search . '%');
                }),
                \AdminColumnEditable::checkbox('status','Доступен', 'Не доступен')
                    ->setLabel('Статус'),
                AdminColumn::custom('Описания', function(\Illuminate\Database\Eloquent\Model $model) {
                    $content = '<strong>Описание в тизере</strong> ';
                    if ($model->short_description) {
                        $content .= '<span class="label label-success">Да</span><br>';
                    } else {
                        $content .= '<span class="label label-danger">Нет</span><br>';
                    }
                    $content .= '<strong>Описание</strong> ';
                    if ($model->description) {
                        $content .= '<span class="label label-success">Да</span><br>';
                    } else {
                        $content .= '<span class="label label-danger">Нет</span><br>';
                    }
                    $content .= '<strong>Характеристики</strong> ';
                    if ($model->feature) {
                        $content .= '<span class="label label-success">Да</span><br>';
                    } else {
                        $content .= '<span class="label label-danger">Нет</span><br>';
                    }
                    /* $content .= '<strong>Обзор</strong> ';
                    if ($model->review) {
                        $content .= '<span class="label label-success">Да</span><br>';
                    } else {
                        $content .= '<span class="label label-danger">Нет</span><br>';
                    } */
                    return $content ;
                })->setWidth('200px')->setSearchable(false),
                AdminColumn::custom('СЕО', function(\Illuminate\Database\Eloquent\Model $model) {
                    $content = '<strong>Заголовок</strong> ';
                    if ($model->meta_title) {
                        $content .= '<span class="label label-success">Да</span><br>';
                    } else {
                        $content .= '<span class="label label-danger">Нет</span><br>';
                    }
                    $content .= '<strong>Описание</strong> ';
                    if ($model->meta_description) {
                        $content .= '<span class="label label-success">Да</span><br>';
                    } else {
                        $content .= '<span class="label label-danger">Нет</span><br>';
                    }
                    $content .= '<strong>Ключи</strong> ';
                    if ($model->meta_tags) {
                        $content .= '<span class="label label-success">Да</span><br>';
                    } else {
                        $content .= '<span class="label label-danger">Нет</span><br>';
                    }
                    return $content ;
                })->setWidth('150px')->setSearchable(false),
                AdminColumn::lists('pricesOne.price','Цены')
                    ->setSearchable(false)
                    ->setOrderable(function($query, $direction) {

                        $query->join('product_prices', 'products.id', '=', 'product_prices.product_id');
                        $query->where('product_prices.country_id','1');
                        $query->where('product_prices.qty','1');
                        $query->select('products.*','product_prices.price');
                        $query->orderBy('product_prices.price', $direction);
                    }),
                AdminColumn::lists('categories.name','Категории')->setSearchable(false),
                AdminColumn::custom('Тип', function(\Illuminate\Database\Eloquent\Model $model) {
                    return $model->accessory ? 'Аксессуары' : 'Сигнализации';
                })->setOrderable(function($query, $direction) {
                    $query->orderBy('accessory', $direction);
                })->setSearchable(false),

                AdminColumn::datetime('created_at')->setLabel('Дата Создания')->setFormat('d.m.Y H:i'),
                AdminColumn::datetime('updated_at')->setLabel('Дата Изменения')->setFormat('d.m.Y H:i'),
                AdminColumn::custom('Положение', function(\Illuminate\Database\Eloquent\Model $model) {
                    return \App\Services\AdminService::getOrderColumnContent($model,'/admin/products/');
                })->setWidth('150px')->setOrderable(function($query, $direction) {
                    $query->orderBy('order', $direction);
                })->setSearchable(false),
                //AdminColumn::order()->setLabel('Положение'),
               // \AdminColumnEditable::text('slug')->setLabel('Алиас'),

            ])
            ->setDisplaySearch(true)
            ->paginate(20);

        $display->getActions()->setView('product_actions')->setPlacement('panel.heading.actions');
        return $display;
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $product = $id ? \App\Models\Product::find($id) : false;

        $tabs = AdminDisplay::tabbed();
        $tabs->setTabs(function ($id) use($product)  {
            $tabs = [];
            $elements = [
                //AdminFormElement::text('name', 'Название')->required(),
                AdminFormElement::columns()
                ->addColumn([AdminFormElement::text('name', 'Товар %tovar_name%')->required()])
                ->addColumn([AdminFormElement::text('name1', 'Товара (Кого?, Чего?) %tovar_name1%')])
                ->addColumn([AdminFormElement::text('name2', 'Товару (Кому?, Чему?) %tovar_name2%')]),
                AdminFormElement::columns()
                ->addColumn([AdminFormElement::text('name3', 'Товара (Кого?, Что?) %tovar_name3%')])
                ->addColumn([AdminFormElement::text('name4', 'Товаром (Кем?, Чем?) %tovar_name4%')])
                ->addColumn([AdminFormElement::text('name5', 'Товаре (О ком?, О чем?) %tovar_name5%')]),

            ];
            //$elements[] = AdminFormElement::text('short_name', 'Короткое название %tovar_short_name%');
            foreach (\App\Models\Country::all() as $key => $country) {
                $item = AdminFormElement::number('prices['.$country->id.']', 'Цена '.$country->name)
                        ->setValueSkipped(true)
                        ->setHelpText('Если не указана цена для страны (не Россия),
                                        то она будет рассчитываться цена в России * курс');
                if ($product) {
                    $pr = $product->pricesOne->where('country_id',$country->id)->first();
                    if ($pr) {
                        $item->setDefaultValue($pr->price);
                    }
                }

                $item_old = AdminFormElement::number('prices_old['.$country->id.']', 'Старая цена '.$country->name)->setValueSkipped(true);
                if ($product) {
                    $pr_old = $product->pricesOld->where('country_id',$country->id)->first();
                    if ($pr_old) {
                        $item_old->setDefaultValue($pr_old->price);
                    }
                }
                $elements[] = AdminFormElement::columns()
                                ->addColumn([$item])
                                ->addColumn([$item_old]);
            }
            $elements[] = AdminFormElement::columns()
                ->addColumn([AdminFormElement::text('remote_id', 'ID товара в CRM')])
                ->addColumn([AdminFormElement::number('price_diff', 'Отклонение цены от CRM')
                ->setHelpText('Это число будет прибавлено к цене в рублях при обновлении цен с CRM')]);
            $elements[] = AdminFormElement::columns()
                ->addColumn([AdminFormElement::checkbox('status', 'Доступен')])
                ->addColumn([AdminFormElement::checkbox('front', 'Отображать на главной')]);
            $elements[] = AdminFormElement::select('accessory', 'Тип',[0=>'Сигнализации',1=>'Аксессуары'])
                ->setSortable(false)
                ->setDefaultValue(0)
                ->required();
            $elements[] = AdminFormElement::multiselect('categories', 'Категории',$this->categoryTree())
                                ->setSortable(false)
                                ->setValueSkipped(true)
                                ->setView('multiselectRequired')
                                ->required();


            $elements[] = AdminFormElement::multiselect('similar', 'Похожие товары')
                                ->setModelForOptions(\App\Models\Product::class)
                                ->setDisplay('name');
            $elements[] = AdminFormElement::multiselect('recommends', 'Рекомендуем также')
                                ->setModelForOptions(\App\Models\Product::class)
                                ->setDisplay('name');
            /* $elements[] = AdminFormElement::multiselect('buywith', 'С этим товаром покупают')
                                ->setModelForOptions(\App\Models\Product::class)
                                ->setDisplay('name'); */
            $elements[] = AdminFormElement::images('images', 'Изображения')->setUploadFileName(function(\Illuminate\Http\UploadedFile $file) {
                return $file->getClientOriginalName();
            });
            $elements[] = AdminFormElement::textarea('image_alts', 'Атрибут alt для картинок')->setHelpText('Каждый alt с новой строки. 1я строка = 1я картинка');

            $tabs[] = AdminDisplay::tab(AdminForm::elements($elements))->setLabel('Основное');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                /* AdminFormElement::ckeditor('short_description', 'Описание в тизере'), */
                AdminFormElement::textarea('short_description', 'Короткое описание')->setRows(3)->setHelpText('Отображается в тизере. Если не указано, то отображается полное описание'),
                AdminFormElement::ckeditor('description', 'Описание'),
                AdminFormElement::columns()
                    ->addColumn([AdminFormElement::text('signals', 'Подавляет сигналы')])
                    ->addColumn([AdminFormElement::text('radius', 'Радиус подавления')])
                    ->addColumn([AdminFormElement::text('power', 'Мощность подавления')]),
                AdminFormElement::textarea('feature', 'Характеристики')->setRows(5)->setHelpText('Каждый парамет с новой строки.<br>Название и значение разделять | '),
                /* AdminFormElement::ckeditor('review', 'Обзор'), */

            ]))->setLabel('Описания');
            $tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::text('slug', 'Алиас'),
                AdminFormElement::text('meta_title', 'Заголовок META')->setHelpText('Доступны переменные: %product% -> Название продукта, %country% -> Страна производителя, %category% -> Имя категории. %phone%, %phone2%, %address%, %city%, %city1%, %city2%, %city3%, %city4%, %city5%, %city6% -> "в "+%city5%'),
                AdminFormElement::textarea('meta_description', 'Описание META')->setRows(2)->setHelpText('Доступны переменные: %product% -> Название продукта, %country% -> Страна производителя, %category% -> Имя категории. %phone%, %phone2%, %address%, %city%, %city1%, %city2%, %city3%, %city4%, %city5%, %city6% -> "в "+%city5%'),
                AdminFormElement::text('meta_tags', 'Ключи META')->setHelpText('Доступны переменные: %product% -> Название продукта, %country% -> Страна производителя, %category% -> Имя категории. %phone%, %phone2%, %address%, %city%, %city1%, %city2%, %city3%, %city4%, %city5%, %city6% -> "в "+%city5%'),
            ]))->setLabel('SEO');
            return $tabs;
        });
        return AdminForm::form()->addElement($tabs);
    }
    public static function categoryTree(&$tree = [], $prefix='' ,$parent = 0)
    {
        if ($parent) {
            $categories = \App\Models\Category::where('parent_id',$parent)->orderBy('order')->get();
        } else {
            $categories = \App\Models\Category::whereNull('parent_id')->orWhere('parent_id',$parent)->orderBy('order')->get();
        }
        foreach ($categories as $key => $category) {
            $tree[$category->id] = $prefix.$category->name;
            if (\App\Models\Category::where('parent_id',$category->id)->count()) {
                self::categoryTree($tree,'- ',$category->id);
            }
        }

        return $tree;
    }
    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }

    /**
     * @return void
     */
    public function onDelete($id)
    {
        // remove if unused
    }

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
}
