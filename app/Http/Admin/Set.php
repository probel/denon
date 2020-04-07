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
 * Class Set
 *
 * @property \App\Models\Set $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Set extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Теги';
        $this->icon = 'fa fa-tags';

        $this->created(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            $this->setSlug($model);
        });
        $this->updated(function ($config, \Illuminate\Database\Eloquent\Model $model) {
           $this->setSlug($model);
        });
    }
    private function setSlug(&$model)
    {
        $i = 0;
        while(true) {
            $slug = $model->slug ? $model->slug : Str::slug($model->name, '-');
            if ($i) {
                $slug .= '_'.$i;
            }
            $is = \App\Models\Set::where('slug', $slug)->where('id', '!=', $model->id)->first();
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
        return AdminDisplay::datatables()
                ->setApply(function ($query) {

                })
                ->setOrder([[4, 'asc']])
                ->setColumns([

                    \AdminColumnEditable::text('name')->setLabel('Название'),
                    \AdminColumnEditable::checkbox('status','Доступен','Не доступен')->setLabel('Статус'),
                    AdminColumn::datetime('created_at')->setLabel('Дата Создания')->setFormat('d.m.Y H:i'),
                    AdminColumn::datetime('updated_at')->setLabel('Дата Изменения')->setFormat('d.m.Y H:i'),
                    AdminColumn::custom('Положение', function(\Illuminate\Database\Eloquent\Model $model) {
                        return \App\Services\AdminService::getOrderColumnContent($model,'/admin/sets/');
                    })->setWidth('150px')->setOrderable(function($query, $direction) {
                        $query->orderBy('order', $direction);
                    })->setSearchable(false),
                ])
                ->paginate(30);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $model = $id ? \App\Models\Set::find($id) : null;

        $columns[] = AdminFormElement::text('name', 'Название')->required();
        $columns[] = AdminFormElement::checkbox('status', 'Доступна')->setDefaultValue(1);
        $columns[] = AdminFormElement::multiselect('products', 'Товары')
            ->setModelForOptions(\App\Models\Product::class)
            ->setDisplay('name');
        $columns[] = AdminFormElement::multiselect('categories', 'Категории')
            ->setModelForOptions(\App\Models\Category::class)
            ->setDisplay('name');

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
