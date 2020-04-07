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
/**
 * Class Brand
 *
 * @property \App\Models\Brand $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Blog extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Блог';
        $this->icon = 'fa fa-book';
        $this->created(function ($config, \Illuminate\Database\Eloquent\Model $model) {

            $this->setSlug($model);
            $this->saveValues($model);
        });
        $this->updated(function ($config, \Illuminate\Database\Eloquent\Model $model) {

            $this->setSlug($model);
            $this->saveValues($model);
        });
    }
    private function setSlug(&$model)
    {
        $i = 0;
        while (true) {
            $slug = $model->slug ? $model->slug : Str::slug($model->title, '-');
            if ($i) {
                $slug .= '_' . $i;
            }
            $is = \App\Models\Blog::where('slug', $slug)->where('id', '!=', $model->id)->first();
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
    public function saveValues(&$model)
    {
        $model->fields = request()->fields;
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
        return AdminDisplay::datatables()

            ->setApply(function ($query) {
                //$query->orderBy('created_at', 'desc');
            })
            ->setOrder([[6, 'asc']])
            ->setColumns([
                AdminColumn::datetime('created_at')->setFormat('d.m.Y')->setLabel('Дата'),
                \AdminColumnEditable::checkbox('status','Доступен','Не доступен')->setLabel('Статус'),
                AdminColumn::text('title')->setLabel('Заголовок'),
                AdminColumn::text('slug')->setLabel('Алиас'),
                AdminColumn::datetime('created_at')->setLabel('Дата Создания')->setFormat('d.m.Y H:i'),
                AdminColumn::datetime('updated_at')->setLabel('Дата Изменения')->setFormat('d.m.Y H:i'),
                AdminColumn::custom('Положение', function(\Illuminate\Database\Eloquent\Model $model) {
                    return \App\Services\AdminService::getOrderColumnContent($model,'/admin/blogs/');
                })->setWidth('150px')->setOrderable(function($query, $direction) {
                    $query->orderBy('order', $direction);
                })->setSearchable(false),
            ])
            //->setDisplaySearch(true)
            ->paginate(50);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {

        $tabs = AdminDisplay::tabbed();
        $tabs->setTabs(function () use($id) {
            $tabs = [];
            $items = [
                ['type' => 'image','key'=>'image','title' => 'Image'],
                ['type' => 'text','key'=>'title_en','title'=>'Name [EN]'],
                ['type' => 'text','key'=>'title_de','title'=>'Name [DE]'],
                ['type' => 'text','key'=>'title_ru','title'=>'Name [RU]'],
                ['type' => 'clearfix'],
                ['type' => 'ckeditor','key'=>'text_en','title'=>'Text [EN]'],
                ['type' => 'ckeditor','key'=>'text_de','title'=>'Text [DE]'],
                ['type' => 'ckeditor','key'=>'text_ru','title'=>'Text [RU]'],
            ];
            $items = [];
            if ($id && $blog = \App\Models\Blog::find($id)) {
                $items = $blog->fields ?? [];
            }

            $prefix = 'fields';
            $title = 'Поля';
            $products = \App\Models\Product::orderBy('name')->pluck('name','id')->toArray();

            $elements = [
                AdminFormElement::text('title', 'Заголовок')->required(),
                AdminFormElement::html('<div class="clearfix"></div>'),
                AdminFormElement::view('admin.multi_fields',compact('items','prefix','title','products')),
                AdminFormElement::html('<div class="clearfix"></div>'),
                //AdminFormElement::ckeditor('body', 'Содержимое'),
            ];

            $tabs[] = AdminDisplay::tab(AdminForm::elements($elements))->setLabel('Содержимое');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::date('created_at', 'Дата публикации')->setDefaultValue(\Carbon\Carbon::now()),
                AdminFormElement::image('image', 'Превью картинка'),
                AdminFormElement::textarea('description', 'Короткое описание')->setRows(3),

            ]))->setLabel('Превью');
            $tabs[] = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements([
                AdminFormElement::text('slug', 'Алиас'),
                AdminFormElement::text('meta_title', 'Заголовок META')->setHelpText('Доступны переменные: %brand% -> Имя производителя, %category% -> Имя категории. %city%, %city1%, %city2%, %city3%, %city4%, %city5%, %city6% -> "в "+%city5%'),
                AdminFormElement::textarea('meta_description', 'Описание META')->setRows(2)->setHelpText('Доступны переменные: %brand% -> Имя производителя, %category% -> Имя категории. %city%, %city1%, %city2%, %city3%, %city4%, %city5%, %city6% -> "в "+%city5%'),
                AdminFormElement::text('meta_tags', 'Ключи META')->setHelpText('Доступны переменные: %brand% -> Имя производителя, %category% -> Имя категории. %city%, %city1%, %city2%, %city3%, %city4%, %city5%, %city6% -> "в "+%city5%'),
            ]))->setLabel('SEO');
            return $tabs;
        });
        return AdminForm::form()->addElement($tabs);
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
    /**
     * @return FormInterface
     */
    public function onDelete()
    {

    }
}
