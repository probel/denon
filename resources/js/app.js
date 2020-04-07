
require('./bootstrap');
require('./sliders');
require('./forms');

window.yaCounterTemp = {
    reachGoal: function (goal) {
        console.log(goal);
    }
}
$(document).ready(function () {

    /* $('[type="tel"]').mask('+0 (000) 000-00-00', {
        placeholder: "+7",
        clearIfNotMatch: true
    }); */

});


/* $(document).on('click', 'a[href^=#]:not([href=#])', function (event) {
    var anchor = $(this).attr('href');
    var itemTop = window.pageYOffset + $(anchor)[0].getBoundingClientRect().top;

    if ($(anchor).length > 0) {
        $('html, body').stop().animate({
            scrollTop: itemTop
        }, 500);
        $('.left-fixed a').removeClass('active');
        $(this).addClass('active')

        return false;
    }
}); */
$(document).ready(function () {
    
    $(document).on('submit','.js-form__to-cart', function () {
        $.post($(this).attr('action'), $(this).serialize(),
            function (data, textStatus, jqXHR) {

                $.each(data.fields, function (indexInArray, valueOfElement) {
                    $(indexInArray).html(valueOfElement);
                });
                if (data.popup) {
                    $('.modal').modal('hide');
                    $(data.popup).modal('show');
                }
                if (data.location) {
                    location.href = data.location;
                }
                if (!data.quantity) {
                    $('.js-cart-form').html(data.orderform);
                }
            },
            "json"
        );
        return false;
    });

    $(document).on('click', '.js-minus', function () {
        let val = parseInt($(this).parents('.js-plusminus').find('[name="count"]').val());
        val -= 1;
        if (val < 1) {
            val = 1;
        }
        setQuickLink(val);
        $(this).parents('.js-plusminus').find('[name="count"]').val(val);

        let price = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('price'));
        let oldPrice = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('old_price'));
        $('.js-product-sum').text((val*price).toLocaleString('ru'));
        $('.js-product-old_sum').text((val*oldPrice).toLocaleString('ru'));
        if ($(this).hasClass('js-up')) {
            $(this).parents('.js-plusminus').submit();
        }
    });
    $(document).on('click', '.js-plus', function () {
        var val = parseInt($(this).parents('.js-plusminus').find('[name="count"]').val());
        val += 1;
        if (val < 1) {
            val = 1;
        }
        setQuickLink(val);
        let price = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('price'));
        let oldPrice = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('old_price'));
        $('.js-product-sum').text((val*price).toLocaleString('ru'));
        $('.js-product-old_sum').text((val*oldPrice).toLocaleString('ru'));
        $(this).parents('.js-plusminus').find('[name="count"]').val(val);
        if ($(this).hasClass('js-up')) {
            $(this).parents('.js-plusminus').submit();
        }
    });
    $(document).on('click', '.js-form__to-cart .js-cart-remove', function () {
        $(this).parents('.js-form__to-cart').find('[name="count"]').val(0);
        $(this).parents('.js-form__to-cart').submit();
    });
});

