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
            AdminService::setPageValues($model);
        });
        $this->updated(function ($config, \Illuminate\Database\Eloquent\Model $model) {
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
                AdminColumn::custom('Заголовок' ,function ($model)
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
            $simpleTitle = AdminFormElement::text('title', 'Заголовок')->required(true);
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
                            AdminFormElement::view('admin.form.panelOpen',['key'=>'slider','title'=>__('Слайдер')]),
                            AdminFormElement::view('admin.slider',['items' => $page->values['slider'] ?? [],'prefix'=>'values[slider]']),
                            AdminFormElement::view('admin.form.panelClose'),
                        ];
                        $elements = array_merge($elements,AdminService::getSloganFields($page,false));
                        //\array_unshift($elements,$adminTitle);
                        break;
                    case 'cart':
                        $elements = [
                            AdminFormElement::text('title', 'Заголовок')->required(true),
                            AdminFormElement::view('admin.form.panelOpen',['key'=>'text','title'=>__('Текст под формой')]),
                        ];
                        $elements = array_merge($elements,AdminService::getTitleFields($page,'delivery'));
                        $elements[] = AdminFormElement::ckeditor('values[delivery_text]', 'Текст')
                                        ->setValueSkipped(true)
                                        ->setDefaultValue($page->values['delivery_text'] ?? '');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        break;
                    case 'warranty':
                        $elements = AdminService::getSloganFields($page);
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'warranty','title'=>__('Гарантия')]);
                        $elements = array_merge($elements,AdminService::getTitleFields($page,'warranty'));
                        $elements[] = AdminFormElement::ckeditor('values[warranty_text]', 'Текст')
                                    ->setValueSkipped(true)
                                    ->setDefaultValue($page->values['warranty_text'] ?? '');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'service','title'=>__('Сервис')]);
                        $elements = array_merge($elements,AdminService::getTitleFields($page,'service'));
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'service_addresses','title'=>__('Адреса'),'type'=>'info']);
                        $elements[] = AdminFormElement::view('admin.address',['items' => $page->values['service_addresses'] ?? [],'prefix'=>'values[service_addresses]']);
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        break;
                    case 'delivery':
                        $elements = AdminService::getSloganFields($page);
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'pay','title'=>__('Доставка и оплата')]);
                        $elements = array_merge($elements,AdminService::getTitleFields($page,'pay'));
                        $elements[] = AdminFormElement::ckeditor('values[pay_text]', 'Текст')
                                    ->setValueSkipped(true)
                                    ->setDefaultValue($page->values['pay_text'] ?? '');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'delivery','title'=>__('Доставка по москве')]);
                        $elements[] = AdminFormElement::text('values[delivery_title]', 'Заголовок')
                                    ->setValueSkipped(true)
                                    ->setDefaultValue($page->values['delivery_title'] ?? '');
                        $elements[] = AdminFormElement::ckeditor('values[delivery_text]', 'Текст')
                                    ->setValueSkipped(true)
                                    ->setDefaultValue($page->values['delivery_text'] ?? '');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        break;
                    case 'contacts':
                        $elements = AdminService::getSloganFields($page);
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'contacts','title'=>__('Контакты')]);
                        $elements = array_merge($elements,AdminService::getTitleFields($page,'contacts'));
                        $elements[] = AdminFormElement::ckeditor('values[contacts_text]', 'Текст')
                                    ->setValueSkipped(true)
                                    ->setDefaultValue($page->values['contacts_text'] ?? '');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'show','title'=>__('Шоу рум')]);
                        $elements = array_merge($elements,AdminService::getTitleFields($page,'show'));
                        $elements[] = AdminFormElement::ckeditor('values[show_text]', 'Текст')
                                    ->setValueSkipped(true)
                                    ->setDefaultValue($page->values['show_text'] ?? '');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        $elements[] = AdminFormElement::view('admin.form.panelOpen',['key'=>'show','title'=>__('Юридическая информация')]);
                        $elements[] = AdminFormElement::ckeditor('values[legal_text]', 'Текст')
                                    ->setValueSkipped(true)
                                    ->setDefaultValue($page->values['legal_text'] ?? '');
                        $elements[] = AdminFormElement::view('admin.form.panelClose');
                        break;
                    case 'search':
                        $elements = AdminService::getSloganFields($page);
                        $elements[] = AdminFormElement::number('values[paginate]', 'Элементов на страницу')
                                        ->setValueSkipped(true)
                                        ->setDefaultValue($page->values['paginate'] ?? 6);

                        break;
                    case 'news':
                    case 'installations':
                        $elements = [
                            AdminFormElement::text('title', 'Заголовок')->required(),
                            AdminFormElement::number('values[paginate]', 'Элементов на страницу')
                                ->setValueSkipped(true)
                                ->setDefaultValue($page->values['paginate'] ?? 6),
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

            $tabs[] = AdminService::seoTab((!$page || $page->type == 'typical'));

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
