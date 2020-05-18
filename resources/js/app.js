
require('./bootstrap');
require('./sliders');
require('./forms');

window.yaCounterTemp = {
    reachGoal: function (goal) {
        console.log(goal);
    }
}
if (window.innerWidth < 1200) {
    $('.category-page__filter__options').collapse();
}
if (window.similar) {
    $(document).on('change', '.js-change-similar', function () {
        let pid = $(this).data('pid');
        let cid = $(this).val();
        let row = $(this).data('row');
        let product = _.find(similar, (p) => { return p.id == pid });
        let compare = _.find(similar, (p) => { return p.id == cid });
        if (product && compare) {
            setCompareValues(product, compare, row);
        } else {
            $('.param-row-'+row).html('');
        }
    });
    function setCompareValues(product, compare, row) {
        let names = [];
        if (!product.params) return false;

        _.forEach(product.params, function(group, groupKey) {
            _.forEach(group, function(param) {
                let title = param.title;
                let html = '';
                let compareParam = _.find(compare.params[groupKey], (p) => { return p.title == title});
                if (compareParam) {
                    if (compareParam.dot) {
                        for (let index = 0; index < parseInt(compareParam.value); index++) {
                            html += '<span class="circle"></span>';
                        }
                    } else {
                        html = compareParam.value;
                    }
                }
                $(`#features-item-${groupKey} [data-title="${title}"] .param-row-${row}`).html(html);
            });
        });
    }
}
if (window.defaultImages) {
    initProductSlider();
    window.images = defaultImages;
    if (variations[0] && variations[0].images && variations[0].images.length) {
        window.images = variations[0].images;
    }
    $(document).on('click', '.js-change-color', function () {
        let key = $(this).data('key');
        variation = variations[key];
        window.images = defaultImages;
        if (variation && variation.images && variation.images.length) {
            window.images = variation.images;
        }
        $('[name="vid"]').val(key);
        $('.js-change-color-wrapper').removeClass('active');
        $(this).parent().addClass('active');
        setImages();
    });
    $(document).on('click', '.js-small-image ', function () {
        $('.js-big-image').data('key',$(this).data('key'));
        $('.js-big-image img').attr('src',$(this).attr('src'));
    });
}
function setImages() {
    let first = _.head(window.images);
    let html = '';
    window.images.forEach((element,key) => {
        html += `<img data-key="${key}" class="photo-small__item d-flex mx-auto js-small-image align-self-center m-auto" src="/${element.path}" alt="${element.alt}">`
    });
    $('.js-big-image').attr('href','/'+first.path).data('key',0);
    $('.js-big-image img').attr('src','/'+first.path).attr('alt',first.alt);
    $('.photo-small-slick').slick('unslick').html(html);
    initProductSlider();
}
function initProductSlider() {
    $('.photo-small-slick').not('.slick-initialized').slick({
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"></button>',
        nextArrow: '<button type="button" class="slick-next"></button>',
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1
    });
}
$(document).on('click', '.js-big-image ', function () {
    let items = [];
    window.images.forEach(element => {
        items.push({
            src  : '/'+element.path
        });
    });
    $.fancybox.open(items,{},$(this).data('key'));
    console.log($(this).data('key'));
    return false;
});
$(document).on('click', '.js-to-top', function (event) {
    $('html, body').stop().animate({
        scrollTop: 0
    }, 500);
    return false;
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
                formResponse(data)
            },
            "json"
        );
        return false;
    });
    $(document).on('click', '.js-cart-remove', function () {
        let href = $(this).attr('href');
        axios.get(href)
            .then(function (response) {
                formResponse(response.data)
            })
            .catch(function (error) {
                console.log(error);
            });
        return false;
    });
    $(document).on('click', '.js-cart-clear', function () {
        let href = $(this).attr('href');
        axios.get(href)
            .then(function (response) {
                formResponse(response.data)
            })
            .catch(function (error) {
                console.log(error);
            });
        return false;
    });
    $(document).on('click', '.js-front-filter-link', function () {
        let href = '/category/'+$(this).data('id');
        axios.get(href)
            .then((response) => {
                $('.js-front-caltalog-content').html(response.data.html);
                $('.js-front-filter-link').removeClass('active');
                $(this).addClass('active');
            })
            .catch((error) => {
                console.log(error);
            });
        return false;
    });
    function formResponse(data) {
        if (data.location) {
            location.href = data.location;
        } else {
            $.each(data.fields, function (indexInArray, valueOfElement) {
                $(indexInArray).html(valueOfElement);
            });
            if (data.popup) {
                $.fancybox.open(data.popup);
            }
        }
    }
    $(document).on('click', '.js-minus', function () {
        let val = parseInt($(this).parents('.js-plusminus').find('[name="count"]').val());
        val -= 1;
        if (val < 1) {
            val = 1;
        }
        $(this).parents('.js-plusminus').find('[name="count"]').val(val);

        let price = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('price'));
        let oldPrice = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('old_price'));
        $(this).parents('.js-form__to-cart').find('.js-product-sum').text((val*price).toLocaleString('ru'));
        $(this).parents('.js-form__to-cart').find('.js-product-old_sum').text((val*oldPrice).toLocaleString('ru'));
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
        let price = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('price'));
        let oldPrice = parseFloat($(this).parents('.js-plusminus').find('[name="count"]').data('old_price'));
        $(this).parents('.js-form__to-cart').find('.js-product-sum').text((val*price).toLocaleString('ru'));
        $(this).parents('.js-form__to-cart').find('.js-product-old_sum').text((val*oldPrice).toLocaleString('ru'));
        $(this).parents('.js-plusminus').find('[name="count"]').val(val);
        if ($(this).hasClass('js-up')) {
            $(this).parents('.js-plusminus').submit();
        }
    });

});
$('.js-cart-informer').hover(function () {
       $(this).addClass('-is-open');
});
$(document).on('click', '.cart-informer__popup',function (e) {
    e.stopPropagation();
});
$(document).on('click', function (e) {
    $('.js-cart-informer').removeClass('-is-open');
});
$('.js-features__item').on('hide.bs.collapse', function () {
    $($(this).data('header')).removeClass('-is-open');
})
$('.js-features__item').on('show.bs.collapse', function () {
    $($(this).data('header')).addClass('-is-open');
})
