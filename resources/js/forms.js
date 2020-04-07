$(document).ready(function () {
    $(".js-form--first-screen").each(function (index, element) {
        $(this).validate({
            rules: {
                phone: {
                    required: true,
                },
                name: {
                    required: true,
                },
            },
            messages: {
                phone: {
                    required: 'Введите телефон',
                },
                name: {
                    required: 'Введите имя',
                },
            },
            submitHandler: function submitHandler(form) {
                $.post($(form).attr('action'), $(form).serialize(),
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
                        $('form').trigger("reset");
                        //console.log(data);
                    },
                    "json"
                );
                return false;
            }
        });
    });
});
