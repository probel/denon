<?php

namespace App\Http\Admin;

use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use Illuminate\Database\Eloquent\Model;
use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumn;
use App\Services\AdminService;

/**
 * Class Pages
 *
 * @property \App\Models\Page $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Page extends Section implements Initializable
{

    public function initialize()
    {
        $this->title = 'Страницы';
        $this->icon = 'fa fa-file-alt';
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
    public function isCreatable()
    {
        return true;
    }

    public function isDeletable(Model $model)
    {
        return $model->view == 'typical' && $model->id > 10;
    }

    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;
    public function can($action, Model $model)
    {
        return \Auth::user()->isContentManager();
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
            ->setApply(function ($query) {})
            ->setOrder([[0, 'asc']])
            ->setColumns([
                AdminColumn::text('id', '#'),
                AdminColumn::custom(__('Title') ,function ($model)
                {
                    return '<a href="'.$model->getUrl().'" target="_blank">'.
                        ($model->admin_title ?? $model->name).
                    '</a>';
                }),
                AdminColumn::datetime('updated_at', 'Дата изменения')->setFormat('d.m.Y H:i'),
            ])
            ->setDisplaySearch(true)
            ->paginate(20);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $page = $id ? \App\Models\Page::find($id) : null;
        $tabs = AdminDisplay::tabbed();

        $tabs->setTabs(function () use($page) {

            $tabs = [];
            $adminTitle = AdminFormElement::text('admin_title', 'Административный заголовок');
            $simpleTitle = AdminFormElement::text('name', 'Заголовок')->required(true);
            $elements = [
                AdminFormElement::ckeditor('values[body]', 'Содержимое')
                    ->setValueSkipped(true)
                    ->setDefaultValue($page->values['body'] ?? ''),
            ];
            \array_unshift($elements,$simpleTitle);
            if ($page) {
                switch ($page->type) {
                    case 'front':
                        $elements = [
                            AdminFormElement::view('admin.panelOpen',['key'=>'slider','title'=>__('Слайдер')]),
                            AdminFormElement::view('admin.slider',['items' => $page->values['slider'] ?? [],'prefix'=>'values[slider]']),
                            AdminFormElement::view('admin.panelClose'),
                        ];
                        $elements = array_merge($elements,AdminService::getSloganFields(false));
                        //\array_unshift($elements,$adminTitle);
                        break;
                    case 'cart':
                        $elements = [
                            AdminFormElement::text('title', 'Заголовок')->required(true),
                            AdminFormElement::view('admin.panelOpen',['key'=>'text','title'=>__('Текст под формой')]),
                            AdminFormElement::columns()
                                ->addColumn([
                                    AdminFormElement::image('values[delivery_icon]', 'Иконка текста')
                                        ->setValueSkipped(true)
                                        ->setDefaultValue($page->values['delivery_icon'] ?? ''),
                                ],2)
                                ->addColumn([
                                    AdminFormElement::text('values[delivery_title]', 'Заголовок')
                                        ->setValueSkipped(true)
                                        ->setDefaultValue($page->values['delivery_title'] ?? ''),
                                    AdminFormElement::text('values[delivery_subtitle]', 'Подзаголовок')
                                        ->setValueSkipped(true)
                                        ->setDefaultValue($page->values['delivery_subtitle'] ?? ''),
                                    AdminFormElement::ckeditor('values[delivery_text]', 'Текст')
                                        ->setValueSkipped(true)
                                        ->setDefaultValue($page->values['delivery_text'] ?? ''),
                                ]),
                            AdminFormElement::view('admin.panelClose'),
                            
                        ];
                        break;
                    case 'clubs':
                    case 'authors':
                        $elements = [
                            AdminFormElement::text('name', 'Название')->required(),
                            AdminFormElement::number('values[paginate]', 'Элементов на страницу')
                                ->setValueSkipped(true)
                                ->setDefaultValue($page->values['paginate'] ?? 30),
                        ];
                        break;
                    
                    case 'feedback':
                    case 'search':
                        $elements = [
                            AdminFormElement::text('name', 'Название')->required(),
                        ];
                        break;
                    case 'faq':
                        $elements = [
                            AdminFormElement::text('name', 'Название')->required(),
                            AdminFormElement::view('admin.panelOpen',['key'=>'faq','title'=>__('Вопросы')]),
                            AdminFormElement::view('admin.faq',['items' => $page->values['items'] ?? [],'prefix'=>'values[items]']),
                            AdminFormElement::view('admin.panelClose'),
                        ];
                        break;
                    default:
                        $elements = [
                            AdminFormElement::ckeditor('values[body]', 'Содержимое')
                                ->setValueSkipped(true)
                                ->setDefaultValue($page->values['body'] ?? ''),
                        ];
                        \array_unshift($elements,$simpleTitle);
                        \array_unshift($elements,$adminTitle);
                        break;
                }
            }

            $tabs[] = AdminDisplay::tab(AdminForm::elements($elements))->setLabel('Содержимое');

            $tabs[] = AdminService::seoTab((!$page || $page->type == 'page'));

            return $tabs;
        });
        $form = AdminForm::panel()->addHeader($tabs);
        return $form;
    }

    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}
