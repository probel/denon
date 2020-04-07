<div class="container">
    <div class="contacts__box">
        <h2 class="contacts__box__title text-center">Контакты</h2>
        <div class="contacts__box__item d-flex align-items-center">
            <div class="image__wraper icon-center">
                @svg('images/svg/contact-1.svg')
            </div>
            <div class="text">
                <a href="mailto:{{ getEmail() }}">{{ getEmail() }}</a>
            </div>
        </div>
        <div class="contacts__box__item d-flex align-items-center">
            <div class="image__wraper icon-center">
                @svg('images/svg/contact-2.svg')
            </div>
            <div class="text">
                <a onclick="yaCounter54742531.reachGoal('call');" href="tel:{{ getPhone()['clear'] }}">{{ getPhone()['format'] }}</a>
            </div>
        </div>
        <div class="contacts__box__item d-flex align-items-center">
            <div class="image__wraper icon-center">
                @svg('images/svg/contact-3.svg')
            </div>
            <div class="text">

                {!! rv(getAddress()) !!}
            </div>
        </div>
        <div class="contacts__box__item d-flex align-items-center">
            <div class="image__wraper icon-center">
                @svg('images/svg/contact-4.svg')
            </div>
            <div class="text">
               {!! str_replace("\n","<br>",rv(getSchedule())) !!}
            </div>
        </div>
    </div>

</div>
