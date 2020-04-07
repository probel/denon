$(document).ready(function () {
    if($('.form-element-files').length) {
        $('body').on('mouseup', '.form-element-files__info', function (e) {
            e.stopPropagation();
        });
        $('.dz-message').remove();
        $('.form-element-files').jesse({
            selector:    '.form-element-files__item',
            placeholder: '',
            onStop: function(position, prevPosition, item) {
                console.log('this');
                elements = $(item).parents('.form-group').find('input').val().split(',');
                newE = [];
                it = elements[prevPosition];
                $.each(elements, function (indexInArray, valueOfElement) { 
                    if (indexInArray == position) {
                        newE.push(it);
                    }
                    if (indexInArray != prevPosition) {
                        newE.push(valueOfElement);
                    }
                    
                });
                $(item).parents('.form-group').find('input').val(newE.join(','));
            }

        });
    }
});