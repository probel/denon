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
use App\Services\AdminService;

/**
 * Class Category
 *
 * @property \App\Models\Category $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Category extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Категории';
        $this->icon = 'fa fa-tags';

        $this->created(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            AdminService::setSlug($model);
            AdminService::setMetaTitle($model);
            AdminService::setPageValues($model);
        });
        $this->updated(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            AdminService::setSlug($model);
            AdminService::setMetaTitle($model);
            AdminService::setPageValues($model);
        });
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
        return AdminDisplay::tree()->setValue('title');
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $model = $id ? \App\Models\Category::find($id) : null;
        //dd($model->values);
        $tabs = AdminDisplay::tabbed();
        $tabs->setTabs(function () use($model) {

            $tabs = [];
            $fields = AdminService::getSloganFields($model);
            $fields[] = AdminFormElement::view('admin.panelOpen',['key'=>'teaser','title'=>__('Тизер (для подкатегорий)')]);
            $fields[] = AdminFormElement::text('teaser_title', 'Подзаголовок');
            $fields[] = AdminFormElement::ckeditor('teaser_description', 'Описание');
            $fields[] = AdminFormElement::view('admin.panelClose');
            $tabs[] = AdminDisplay::tab(AdminForm::elements($fields))->setLabel('Содержимое');

            $tabs[] = AdminService::seoTab();

            return $tabs;
        });
        $form = AdminForm::panel()->addHeader($tabs);
        return $form;

        $model = $id ? \App\Models\Category::find($id) : null;
        $columns = [AdminFormElement::text('name', 'Название')->required(),];
        
        $columns = array_merge($columns, AdminService::getSloganFields($page));
        $columns[] = AdminFormElement::columns()
                ->addColumn([AdminFormElement::checkbox('status', 'Доступен')])
                ->addColumn([AdminFormElement::checkbox('front', 'Отображать на главной')])
                ->addColumn([AdminFormElement::checkbox('show_catalog', 'Отображать в каталоге')]);
        $columns[] = AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::number('paginate', 'Количество товаров на страницу')
                        ->setDefaultValue(12)
                        ->required()
                ])
                ->addColumn([AdminFormElement::text('front_btn', 'Название кнопки на главной')]);
        $columns[] = AdminFormElement::text('page_title', 'Заголовок страницы');

        $columns[] = AdminFormElement::text('slug', 'Алиас');
        $columns[] = AdminFormElement::text('meta_title', 'Заголовок META');
        $columns[] = AdminFormElement::textarea('meta_description', 'Описание META')->setRows(2);
        $columns[] = AdminFormElement::text('meta_tags', 'Ключи META');

        return AdminForm::panel()->addBody($columns);
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
}
