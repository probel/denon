<?php

namespace App\Services;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use AdminColumn;
use Illuminate\Support\Str;
use \App\Models\{Company, Review, User};
class AdminService
{
    public static function setSlug(&$model)
    {
        $class = get_class($model);
        $i = 0;
        while(true) {
            $slug = $model->slug ? $model->slug : Str::slug(($model->name ? $model->name : $model->title), '-');
            if ($i) {
                $slug .= '_'.$i;
            }
            $is = $class::where('slug', $slug)->where('id', '!=', $model->id)->first();
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
    public static function setMetaTitle(&$model)
    {
        if (!$model->meta_title) {
            $model->meta_title = $model->name ?? $model->title;
            $model->save();
        }
    }

    public static function setPageValues(&$model)
    {
        $allow = [
            'save_and_continue',
            'save_and_create',
            'save_and_close'
        ];
        if (in_array(request()->next_action, $allow)) {
            $values = request()->values ?? [];
            $model->values = $values;
            $model->save();
        }
    }
    public static function getOrderColumnContent($model,$basePath)
    {
        $class = get_class($model);
        $content = '<span class="hidden">'.$model->order.'</span>';
        if ($model->order > $class::min('order')) {
            $content .= '<form action="'.$basePath.$model->id.'/up" method="POST" style="display:inline-block;">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Подвинуть вверх">
                    ↑
                </button>
            </form>';
        }
        $content .= '<form action="'.route('admin.order').'" class="order-form" method="POST" style="display:inline-block;">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <input type="hidden" name="old" value="'.$model->order.'">
                <input type="hidden" name="model" value="'.$class.'">
                <input type="hidden" name="id" value="'.$model->id.'">
                <input class="form-control field-order" type="number" name="new" value="'.$model->order.'">
            </form>';
        if ($model->order < $class::max('order')) {
            $content .= '<form action="'.$basePath.$model->id.'/down" method="POST" style="display:inline-block;">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <button class="btn btn-default btn-sm" data-toggle="tooltip" title="Подвинуть вниз">
                    ↓
                </button>
            </form>';
        }
        return $content;
    }
    public static function seoTab($slug = true)
    {
        $elements = [];
        if ($slug) {
            $elements[] = AdminFormElement::text('slug', 'Алиас')->setHelpText('Адрес страницы. Оставьте пустым, чтобы сгенерировать автоматически');
        }
        $elements[] = AdminFormElement::text('meta_title', 'Заголовок META');
        $elements[] = AdminFormElement::textarea('meta_description', 'Описание META')->setRows(2);
        $elements[] = AdminFormElement::text('meta_keywords', 'Ключи META');
        $tab = AdminDisplay::tab(new \SleepingOwl\Admin\Form\FormElements($elements))->setLabel('SEO');
        return $tab;
    }
    public static function imageGroup($value, $field = 'image',$path = 'images/uploads',$gr = true) {
        if ($gr) {
            $group = [
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::image($field.'[path]', 'Картинка')
                            ->setValueSkipped(true)
                            ->setUploadPath(function(\Illuminate\Http\UploadedFile $file) use($path) {
                                return $path;
                            })
                            ->setDefaultValue($value['path'] ?? ''),
                        AdminFormElement::text($field.'[alt]', 'Alt Картинки')
                            ->setValueSkipped(true)
                            ->setDefaultValue($value['alt'] ?? ''),
                        AdminFormElement::text($field.'[title]', 'Заголовок Картинки')
                            ->setValueSkipped(true)
                            ->setDefaultValue($value['title'] ?? ''),
                    ],2),
            ];
        } else {
            $group = [
                AdminFormElement::image($field.'[path]', 'Картинка')
                    ->setValueSkipped(true)
                    ->setUploadPath(function(\Illuminate\Http\UploadedFile $file) use($path) {
                        return $path;
                    })
                    ->setDefaultValue($value['path'] ?? ''),
                AdminFormElement::text($field.'[alt]', 'Alt Картинки')
                    ->setValueSkipped(true)
                    ->setDefaultValue($value['alt'] ?? ''),
                AdminFormElement::text($field.'[title]', 'Заголовок Картинки')
                    ->setValueSkipped(true)
                    ->setDefaultValue($value['title'] ?? ''),
            ];
        }

        return $group;
    }
    public static function getTitleFields($page,$prefix = '') {
        $fields = [
            AdminFormElement::view('admin.panelOpen',['key'=>'title','title'=>__('Заголовок'),'type'=>'info']),
            AdminFormElement::columns()
                ->addColumn([
                    AdminFormElement::image('values['.$prefix.'_icon]', 'Иконка')
                        ->setValueSkipped(true)
                        ->setDefaultValue($page->values[$prefix.'_icon'] ?? ''),
                ],3)
                ->addColumn([
                    AdminFormElement::text('values['.$prefix.'_title]', 'Заголовок')
                        ->setValueSkipped(true)
                        ->setDefaultValue($page->values[$prefix.'_title'] ?? ''),
                    AdminFormElement::text('values['.$prefix.'_subtitle]', 'Подзаголовок')
                        ->setValueSkipped(true)
                        ->setDefaultValue($page->values[$prefix.'_subtitle'] ?? ''),
                ]),
            AdminFormElement::view('admin.panelClose'),
        ];
        return $fields;
    }
    public static function getSloganFields($page,$isBg = true)
    {
        
        if ($isBg) {
            $fields = [
                AdminFormElement::view('admin.panelOpen',['key'=>'slogan','title'=>__('Первый экран')]),
                AdminFormElement::columns()
                    ->addColumn([
                        AdminFormElement::image('values[bg_image]', 'Фоновая картинка')
                            ->setValueSkipped(true)
                            ->setDefaultValue($page->values['bg_image'] ?? 'images/project/page-title.jpg'),
                    ],3)
                    ->addColumn([
                        AdminFormElement::text('title', 'Заголовок')->required(true),
                        AdminFormElement::text('values[slogan]', 'Слоган')
                            ->setValueSkipped(true)
                            ->setDefaultValue($page->values['slogan'] ?? 'ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ВОСПРОИЗВЕДЕНИИ МУЗЫКИ'),
                        AdminFormElement::textarea('values[description]', 'Описание')
                            ->setValueSkipped(true)
                            ->setRows(3)
                            ->setDefaultValue($page->values['description'] ?? 'Уникальные технологии Denon для воспроизведения CD/SACD дисков, строгий отбор комплектующих и мастерство схемотехники помогают воспроизводить звук, максимально приближенный к оригиналу.')
                    ]),
                AdminFormElement::view('admin.panelClose'),
            ];
        } else {
            $fields = [
                AdminFormElement::view('admin.panelOpen',['key'=>'slogan','title'=>__('Слоган')]),                  
                AdminFormElement::text('values[slogan]', 'Заголовок')
                    ->setValueSkipped(true)
                    ->setDefaultValue($page->values['slogan'] ?? 'ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ВОСПРОИЗВЕДЕНИИ МУЗЫКИ'),
                AdminFormElement::textarea('values[description]', 'Описание')
                    ->setValueSkipped(true)
                    ->setRows(3)
                    ->setDefaultValue($page->values['description'] ?? 'Уникальные технологии Denon для воспроизведения CD/SACD дисков, строгий отбор комплектующих и мастерство схемотехники помогают воспроизводить звук, максимально приближенный к оригиналу.'),
                    
                AdminFormElement::view('admin.panelClose'),
            ];
        }
        return $fields;
    }
    public static function getFrontFields($page)
    {

        $values = $page->values ?? [];
        $fields = [
            AdminFormElement::view('admin.panelOpen',['key'=>'slider','title'=> 'Слайдер']),
            AdminFormElement::text('values[title]', 'Заголовок')
                        ->setDefaultValue($values['title'] ?? '')
                        ->setValueSkipped(true),
            AdminFormElement::text('values[description]', 'Описание')
                        ->setDefaultValue($values['description'] ?? '')
                        ->setValueSkipped(true),
            AdminFormElement::images('values[images]', 'Картинки')
                        ->setDefaultValue($values['images'] ?? '')
                        ->setValueSkipped(true),
            AdminFormElement::view('admin.panelClose'),
            AdminFormElement::view('admin.panelOpen',['key'=>'about','title'=> 'О нас']),
            AdminFormElement::text('values[about_title]', 'Заголовок')
                        ->setDefaultValue($values['about_title'] ?? '')
                        ->setValueSkipped(true),
            AdminFormElement::ckeditor('values[about_description]', 'Описание')
                        ->setDefaultValue($values['about_description'] ?? '')
                        ->setValueSkipped(true),
            AdminFormElement::view('admin.panelClose'),
            AdminFormElement::view('admin.panelOpen',['key'=>'stats','title'=> 'Статистика']),
            AdminFormElement::text('values[stats_authors]', 'Авторов на сайте')
                        ->setDefaultValue($values['stats_authors'] ?? '')
                        ->setValueSkipped(true)
                        ->setHelpText('Оставьте пустым, что бы отображать реальное значение'),
            AdminFormElement::text('values[stats_reviews]', 'Всего отзывов')
                        ->setDefaultValue($values['stats_reviews'] ?? '')
                        ->setValueSkipped(true)
                        ->setHelpText('Оставьте пустым, что бы отображать реальное значение'),
            AdminFormElement::text('values[stats_comments]', 'Всего комментариев')
                        ->setDefaultValue($values['stats_comments'] ?? '')
                        ->setValueSkipped(true)
                        ->setHelpText('Оставьте пустым, что бы отображать реальное значение'),
            AdminFormElement::text('values[stats_represent]', 'Официальных представителей')
                        ->setDefaultValue($values['stats_represent'] ?? '')
                        ->setValueSkipped(true)
                        ->setHelpText('Оставьте пустым, что бы отображать реальное значение'),
            AdminFormElement::text('values[stats_represent_comments]', 'Всего комментариев oфициальных представителей')
                        ->setDefaultValue($values['stats_represent_comments'] ?? '')
                        ->setValueSkipped(true)
                        ->setHelpText('Оставьте пустым, что бы отображать реальное значение'),
            AdminFormElement::text('values[stats_map]', 'Отмечено мест на карте')
                        ->setDefaultValue($values['stats_map'] ?? '')
                        ->setValueSkipped(true)
                        ->setHelpText('Оставьте пустым, что бы отображать реальное значение'),
            AdminFormElement::view('admin.panelClose'),
            AdminFormElement::view('admin.panelOpen',['key'=>'faq','title'=> 'Как писать']),
            AdminFormElement::ckeditor('values[faq]', 'Текст')
                        ->setDefaultValue($values['faq'] ?? '')
                        ->setValueSkipped(true),
            AdminFormElement::view('admin.panelClose'),
        ];

        return $fields;
    }

}
