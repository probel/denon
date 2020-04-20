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
 * Class News
 *
 * @property \App\Models\News $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class News extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Новости';
        $this->icon = 'fa fa-book';
        $this->created(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            $this->setValues($model);
        });
        $this->updated(function ($config, \Illuminate\Database\Eloquent\Model $model) {
            $this->setValues($model);
        });
    }
    private static function setValues(&$model)
    {

        $allow = [
            'save_and_continue',
            'save_and_create',
            'save_and_close'
        ];
        if (!in_array(request()->next_action, $allow)) return null;

        $model->values = request()->values;
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
            ->setOrder([[2, 'desc']])
            ->setColumns([
                AdminService::titleColumn(),
                \AdminColumnEditable::checkbox('status','Доступен','Не доступен')
                    ->setLabel('Статус')
                    ->setWidth('120px'),
                AdminColumn::datetime('created_at')->setLabel('Дата Создания')->setFormat('d.m.Y H:i'),
                AdminColumn::datetime('updated_at')->setLabel('Дата Изменения')->setFormat('d.m.Y H:i'),
            ])
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

            $products = \App\Models\Product::orderBy('name')->pluck('name','id')->toArray();
            $news = $id ? \App\Models\News::find($id) : null;
            $elements = [
                AdminFormElement::text('title', 'Заголовок')->required(),
                AdminFormElement::columns()
                    ->addColumn([AdminFormElement::checkbox('status', 'Опубликован')],3)
                    ->addColumn([AdminFormElement::checkbox('in_block', 'Отображать в блоке')],3),
                AdminFormElement::ckeditor('body', 'Содержимое'),
                AdminFormElement::view('admin.form.panelOpen', ['key' => 'link','title' => 'Ссылка после текта' ]),
                AdminFormElement::columns()
                    ->addColumn([
                        $elements[] = AdminFormElement::text('values[link_text]', 'Текст')
                            ->setValueSkipped(true)
                            ->setDefaultValue($news->values['link_text'] ?? '')
                    ])->addColumn([
                        $elements[] = AdminFormElement::text('values[link_path]', 'Адрес')
                            ->setValueSkipped(true)
                            ->setDefaultValue($news->values['link_path'] ?? '')
                    ]),
                AdminFormElement::view('admin.form.panelClose'),
            ];

            $tabs[] = AdminDisplay::tab(AdminForm::elements($elements))->setLabel('Содержимое');
            $tabs[] = AdminDisplay::tab(AdminForm::elements([
                AdminFormElement::date('created_at', 'Дата публикации')->setDefaultValue(\Carbon\Carbon::now()),
                AdminFormElement::image('image', 'Превью картинка'),
                AdminFormElement::textarea('description', 'Короткое описание')->setRows(3),
            ]))->setLabel('Превью');
            $tabs[] = AdminService::seoTab();
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
