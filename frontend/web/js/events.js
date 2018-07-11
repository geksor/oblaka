var reEvents = function (){
    $('.runAgree').on('click', function () {
        if ($('div').is('#agre')) {
            $('#agre').remove();
        }
        agre.render('#panel');
        return false;
    });

    $countSelect.on({
        click: function () {
            $('#count_inp').val($(this).text()).trigger('input').trigger('change');
        },
        touchstart: function () {
            $(this).addClass('no-hover');
        }
    });
    $('#count_inp').on('input', function () {
        $countSelect.removeClass('active');
        var inpVal;
        var totalCount = parseInt($('#hundred').text() + $('#ten').text() + $('#one').text());
        if ($(this).val() > totalCount){
            $(this).val(totalCount);
            if (!$(this).hasClass('shake')){
                var wrap = $(this);
                $(this).addClass('shake');
                $('#countShake').effect('shake', function () {
                    setTimeout(function (){
                        if (wrap.hasClass('shake')){
                            wrap.removeClass('shake')
                        }
                    }, 500)
                });
            }
        }
        inpVal = $(this).val();
        $countSelect.each(function (index) {
            if ($(this).text()===inpVal){
                $(this).addClass('active')
            }
        });
        totalPrice(price);
    });

    $('.inpRadio').on('click', function () {
        $('.infoVar').hide();
        $('.'+$(this).attr('id')).show();
    });
    $('.phoneMask').mask('+7 (999)-999-99-99');

    $('.close').on('click', function () {
        $closeForm.css('display', 'none');
        $('.page').removeClass('panel-open')
    });

    // $('.help-block-error').on('DOMSubtreeModified', function () {
    //     $(this).siblings('input').attr('placeholder', $(this).text())
    // });
};

reEvents();