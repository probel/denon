@extends('layouts.app')
@section('content')
<div class="contact-page bg-light">
    <!-- begin page-title -->
    <section class="page-title d-flex align-items-center">
        <div class="container">
            <div class="col-xl-10 mx-auto px-0">
                <h1 class="page-title__title text-uppercase mb-0"><strong>КОНТАКТЫ</strong></h1>
            </div>
        </div>
    </section>
    <!-- end page-title -->
    <!-- begin slogan -->
    <section class="slogan">
        <div class="container">
            <h2 class="slogan__title text-uppercase text-center">ТОЧНОСТЬ - КЛЮЧЕВОЙ АСПЕКТ ПРИ ВОСПРОИЗВЕДЕНИИ МУЗЫКИ</h2>
            <div class="slogan__text text-uppercase text-center mx-auto"> Уникальные технологии Denon для воспроизведения
                CD/SACD дисков, строгий отбор комплектующих и мастерство схемотехники помогают воспроизводить звук,
                максимально приближенный к оригиналу.</div>
        </div>
    </section>
    <!-- end slogan -->
    <section class="breadcrumb__line position-relative">
        <div class="container h-100">
            <div class="col-xl-10 mx-auto px-0 h-100">
                <div class="breadcrumb__line__in d-flex align-items-center position-relative h-100">
                    <nav aria-label="breadcrumb" class="breadcrumb__wrapper">
                        <ol class="breadcrumb text-uppercase p-0 m-0">
                            <li class="breadcrumb-item"><a href="/">DENON</a></li>
                            <li class="breadcrumb-item active" aria-current="page">КОНТАКТЫ</li>
                        </ol>
                    </nav>
                    <div class="page-title__small text-uppercase">
                        <strong>КОНТАКТНАЯ ИНФОРМАЦИЯ</strong>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- begin contacts -->
    <div class="container">
        <div class="col-xl-10 mx-auto px-0">
            <div class="contact-page__content">
                <div class="section-title d-flex">
                    <div class="section-title__icon flex-shrink-0 d-flex align-items-center">
                        <img src="/images/icons/contacts.png" alt="">
                    </div>
                    <div class="section-title__content d-flex flex-column justify-content-between">
                        <h2 class="section-title__title text-uppercase">КОНТАКТНАЯ ИНФОРМАЦИЯ</h2>
                        <div class="section-title__subtitle text-justify">
                            Интернет магазин «Денон.рф» специализируется на продажах комплектов аппаратуры и отдельных компонентов,
                            совокупная стоимость которых превышает 10.000 рублей (один заказ – одна поставка).
                        </div>
                    </div>
                </div>
                <div class="contact-page__content__text">
                    <p>Номера телефонов: <a href="#">8 (499) 254-62-97</a> <a href="#">8 (916) 707-5-777</a></p>
                    <p>Электронная почта: <a href="#">info@denon.ru</a></p>
                    <p>Обратная связь: <a href=""></a> Написать</p>
                </div>
                <div class="section-title d-flex">
                    <div class="section-title__content d-flex flex-column justify-content-between">
                        <h2 class="section-title__title text-uppercase">Шоу-рум Denon на Пресне</h2>
                        <div class="section-title__subtitle text-justify">
                            Оборудование Denon HEOS представлено на нашей витрине в ТЦ Электроника на Пресне (перед приездом просьба звонить).<br>
                            Адрес: г.Москва, ул.Большая Декабрьская д.3 стр.2 Офис К-9 (Метро 1905 года).
                        </div>
                    </div>
                </div>
                <ul>
                    <li>График работы: с 10 до 20 часов - ежедневно.</li>
                </ul>
                <div class="contact-page__content__separator"></div>
                <div class="contact-page__content__text d-flex justify-content-between mb-0 ">
                    <div>
                        <p>Информация о магазине «Денон.рф»</p>
                        <p>Организационно-правовая форма и название: ООО «ПРАЙ»</p>
                        <p>Юридический адрес: 123242, г. Москва, Зоологическая ул. 3</p>
                        <p>ОГРН 5067746795595</p>
                        <p>Генеральный директор Владимир Буйневич</p>
                    </div>
                    <img class="d-block align-self-end" src="/images/icons/logo.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- end contacts -->
</div>
@endsection
