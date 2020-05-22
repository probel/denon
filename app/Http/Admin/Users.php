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
 * Class User
 *
 * @property \App\Models\User $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Users extends Section implements Initializable
{
    public function initialize()
    {
        $this->title = 'Пользователи';
        $this->icon = 'fa fa-users';


    }
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = true;
    public function can($action, Model $model)
    {
        return true;
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
            ->setOrder([[0, 'desc']])
            ->setHtmlAttribute('data-page-length',50)
            ->setColumns([
                /* AdminColumn::custom('Аватар', function(\Illuminate\Database\Eloquent\Model $model) {
                    $path = $model->image['path'] ?? 'images/avatar.jpg';
                    return '<img src="/'.$path.'" class="img-fluid">';
                })->setWidth('60px'), */
                AdminColumn::text('name')->setLabel('Имя'),
                /* AdminColumn::custom('Роль' ,function ($model)
                {
                    $text = '';
                    switch ($model->role) {
                        case 0:
                            $text = 'Клиент';
                            break;
                        case 1:
                            $text = 'Менеджер';
                            break;
                        case 2:
                            $text = 'Контент менеджер';
                            break;
                        case 3:
                            $text = 'Администратор';
                            break;

                        default:
                            # code...
                            break;
                    }
                    return $text;
                }), */

                AdminColumn::text('email')->setLabel('E-mail'),
                /* AdminColumn::custom('Организация' ,function ($model)
                {
                    $text = implode('<br>',$model->values ?? []);
                    return $text;
                }), */
                AdminColumn::custom('Дата обновления' ,function ($model)
                {
                    $text = $model->updated_at->format('d.m.Y');
                    return $text;
                })->setOrderable('created_at'),
                AdminColumn::custom('Дата регистрации' ,function ($model)
                {
                    $text = $model->created_at->format('d.m.Y');
                    return $text;
                })->setOrderable('created_at'),
            ])
            ->setDisplaySearch(true)
            ->paginate(50);
    }

    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        $user = $id ? \App\Models\User::find($id) : null;
        $columns = [
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::text('name', 'Имя')->required(),
                    /* AdminFormElement::text('values[company]', 'Организация')
                        ->setDefaultValue($values['company'] ?? '')
                        ->setValueSkipped(true), */
                    /* AdminFormElement::text('values[position]', 'Должность')
                        ->setDefaultValue($values['position'] ?? '')
                        ->setValueSkipped(true), */
                    //AdminFormElement::view('admin.panelOpen',['key'=>'settings','title'=> 'Настройки']),
                    AdminFormElement::text('email', 'e-mail')->required(),
                    /* AdminFormElement::select('role', 'Роль',[0=>'Клиент',1=>'Менеджер',2=>'Контент менеджер',3=>'Администратор'])
                                    ->setSortable(false)
                                    ->setDefaultValue(0)
                                    ->required()
                                    ->setHelpText('
                                        <strong>Клиент</strong> без доступа к административной панели<br>
                                        <strong>Менеджер</strong> имеет доступ только к заявкам.<br>
                                        <strong>Контент менеджер</strong> имеет доступ только к наполнению.<br>
                                        <strong>Администратор</strong> имеет доступ ко всем функциям.'), */
                    AdminFormElement::password('password', 'Пароль')
                                    ->allowEmptyValue()
                                    ->hashWithBcrypt()
                                    ->setValueSkipped(function () {
                                        return is_null(request('password'));
                                    })
                                    ->setHelpText('Оставьте пустым, чтобы оставить старый параль'),
                    //AdminFormElement::view('admin.panelClose'),
                ],9),
                //->addColumn(AdminService::imageGroup($user ? $user->image : ['path' => 'images/avatar.jpg'], 'image','images/uploads/users',false),3),

        ];
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

    /**
     * @return void
     */
    public function onRestore($id)
    {
        // remove if unused
    }
    public function isDeletable(Model $model)
    {
        return ! ($model->id == 1);
    }
    public function isEditable(Model $model)
    {
        return true;
    }
}
