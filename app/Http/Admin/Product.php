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
use \App\Services\AdminService;
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
        $this->icon = 'fab fa-product-hunt';
        $this->created(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            $this->setValues($model);
        });
        $this->updated(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            $this->setValues($model);
        });

    }
    public static function setValues(&$model)
    {

        $allow = [
            'save_and_continue',
            'save_and_create',
            'save_and_close'
        ];
        if (!in_array(request()->next_action, $allow)) return null;

        $model->images = request()->images;
        $model->icons = request()->icons;
        $model->variations = request()->variations;
        $model->params = request()->params;
        $model->uploads = request()->uploads;
        $model->save();

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
            ->setOrder([[1, 'asc']])
            ->setColumns([
                AdminColumn::text('article','Артикул')->setWidth('90px'),
                AdminService::nameColumn(),
                \AdminColumnEditable::checkbox('status','Доступен', 'Не доступен')
                    ->setLabel('Статус')
                    ->setWidth('120px'),
                AdminService::seoColumn(),
                AdminColumn::text('price','Цена')->setWidth('90px'),
                AdminColumn::custom('Категория',function(\Illuminate\Database\Eloquent\Model $model) {
                    $res = '<a href="/admin/categories/'.$model->category->id.'/edit">'.$model->category->title.'</a>'.
                    '<a target="_blank" href="'.$model->category->getUrl().'"><i class="ml-2 fas fa-external-link-alt"></i></a>';
                    if ($model->category->parent_id) {
                        $res = '<a href="/admin/categories/'.$model->category->parent->id.'/edit">'.
                                $model->category->parent->title.'</a>'.
                                '<a target="_blank" href="'.$model->category->parent->getUrl().
                                '"><i class="ml-2 fas fa-external-link-alt"></i></a> <i class="mx-1 fas fa-arrow-right"></i> <br>' . $res;
                    }
                    return $res;
                }),
                AdminColumn::datetime('updated_at')->setLabel('Дата Изменения')->setFormat('d.m.Y H:i'),
                //AdminService::orderColumn('/admin/products/'),
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
                AdminFormElement::columns()
                    ->addColumn([AdminFormElement::text('article', 'Артикул')->required()],2)
                    ->addColumn([AdminFormElement::text('name', 'Название')->required()],7)
                    ->addColumn([
                        AdminFormElement::select('category_id', 'Категория',$this->categoryTree())
                            ->setSortable(false)
                            ->setValueSkipped(true)
                            ->required()
                    ],3),
                AdminFormElement::columns()
                    ->addColumn([AdminFormElement::checkbox('status', 'Доступен')])
                    //->addColumn([AdminFormElement::checkbox('front', 'Отображать на главной')->setDefaultValue(0)])
                    ->addColumn([AdminFormElement::checkbox('gift', 'Подарок')->setDefaultValue(1)])
                    ->addColumn([AdminFormElement::checkbox('new', 'Новинка')->setDefaultValue(1)])
                    ->addColumn([AdminFormElement::checkbox('available', 'В наличии')->setDefaultValue(1)]),
                AdminFormElement::columns()
                    ->addColumn([AdminFormElement::number('price', 'Цена')])
                    ->addColumn([AdminFormElement::number('old_price', 'Цена до скидки')])
                    ->addColumn([
                        AdminFormElement::date('available_date', 'Дата поставки')
                            ->setHelpText('Отображается если товара нет в наличии')
                    ]),
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'images','title' => 'Картинки' ]),
                AdminFormElement::view('admin.form.multiImages', ['items' => $product->images ?? [],'prefix' => 'images' ]),
                AdminFormElement::view('admin.form.panelClose'),
            ];

            $tabs[] = AdminDisplay::tab(AdminForm::elements($elements))->setLabel('Основное');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'tab_cart','title' => 'Карточка товара' ]),
                AdminFormElement::ckeditor('short_description', 'Короткое описание под заголовком'),
                AdminFormElement::ckeditor('description', 'Описание'),
                AdminFormElement::ckeditor('footnote', 'Сноска'),
                AdminFormElement::view('admin.form.panelClose'),
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'tab_description','title' => 'Вкладка "Описание"' ]),
                AdminFormElement::ckeditor('long_description', 'Длинное описание'),
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'icons','title' => 'Иконки', 'type' => 'info' ]),
                AdminFormElement::view('admin.form.multiImages', ['items' => $product->icons ?? [],'prefix' => 'icons' ]),
                AdminFormElement::view('admin.form.panelClose'),
                AdminFormElement::view('admin.form.panelClose'),

            ]))->setLabel('Описания');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::view('admin.form.productVariations', ['items' => $product->variations ?? [],'prefix' => 'variations' ]),

            ]))->setLabel('Цвета');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'params_main','title' => 'Основные характеристики', ]),
                AdminFormElement::view('admin.form.productParams', ['items' => $product->params['main'] ?? [],'prefix' => 'params[main]' ]),
                AdminFormElement::view('admin.form.panelClose'),
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'params_spec','title' => 'Спецификации', ]),
                AdminFormElement::view('admin.form.productParams', ['items' => $product->params['spec'] ?? [],'prefix' => 'params[spec]' ]),
                AdminFormElement::view('admin.form.panelClose'),
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'params_common','title' => 'Общие', ]),
                AdminFormElement::view('admin.form.productParams', ['items' => $product->params['common'] ?? [],'prefix' => 'params[common]' ]),
                AdminFormElement::view('admin.form.panelClose'),
            ]))->setLabel('Характеристики');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::view('admin.form.productUploads', ['items' => $product->uploads ?? [],'prefix' => 'uploads' ]),
            ]))->setLabel('Загрузки');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::multiselectajax('news', 'Новости')
                    ->setModelForOptions('\App\Models\News')
                    ->setDisplay('title'),
                AdminFormElement::multiselectajax('promos', 'Акции')
                    ->setModelForOptions('\App\Models\Promo')
                    ->setDisplay('title'),
                AdminFormElement::multiselectajax('installations', 'Инсталяции')
                    ->setModelForOptions('\App\Models\Installation')
                    ->setDisplay('title'),
            ]))->setLabel('Обзоры');
            $tabs[] = AdminService::seoTab();
            //dd($product->uploads);
            return $tabs;
        });
        return AdminForm::form()->addElement($tabs);
    }
    public static function categoryTree(&$tree = [], $prefix='' ,$parent = 0)
    {
        static $cats = null;
        if (is_null($cats)) {
            $cats = \App\Models\Category::with('childs')->orderBy('order')->get();
        }
        if ($parent) {
            $categories = $cats->where('parent_id',$parent);
        } else {
            $categories = $cats->where('parent_id','<',1);
        }
        foreach ($categories as $key => $category) {
            $tree[$category->id] = $prefix.$category->title;
            if ($category->childs->count()) {
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
