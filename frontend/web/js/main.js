var agreeEmail = '';
var agreeName = '';
var agreeINN = '';
var agreeOGRN = '';
var agreeAdres = '';
//--form
    var $form = $('.form');
    var $personalPopUp = $('.persPopUp');
    var $closeForm;

    agre = new AgreAddCompInfo(agreeName, agreeEmail);
    agre.addInnOgrn(agreeINN+agreeOGRN?','+agreeOGRN:'');
    agre.addAdres(agreeAdres);
    var checkbox;


//newAgree

    $(document).on('click', '#agree_ok', function () {
        $('#agre').remove();
        return false;
    });
//endNewAgree
//reserveForm
    var price;
    var totalPrice = function (price) {
        var total = price * $('#count_inp').val();
        $('.totalPrice').text(total.toLocaleString() + ' ₽');
    };
    //count
    var $countSelect = $('.countSelect');
    //endCount
//endReserveForm
    $personalPopUp.on('click', function () {
        var openForm = $(this).data('action');
        $closeForm = $(openForm);
        //reserveForm
        price = $(this).data('price');
        var $class = $('#class');
        var $classShow = $('#class_show');
        switch ($(this).attr('id')){
            case 'standard':
                $class.val('стандарт');
                $classShow.children('span').text('стандарт');
                break;
            case 'vip':
                $class.val('vip');
                $classShow.children('span').text('vip');
                break;
            case 'economy':
                $class.val('эконом');
                $classShow.children('span').text('эконом');
                break;
        }
        //endReserveForm
        $(openForm).show('fade', 400).addClass('panel-open');
        $('.page').addClass('panel-open');
        return false;
    });
    $('.close').on('click', function () {
        $closeForm.css('display', 'none');
        $('.page').removeClass('panel-open')
    });

    $(document).on('click', function (event) {
        if ($(event.target).closest(".noneClose").length
            || $(event.target).closest("#mess_block").length
            || !$(event.target).hasClass('panel-open')) {
            return;
        }
        if ($closeForm){
            $closeForm.find('.close').trigger('click');
        }
        $('#ok').trigger('click');
        event.stopPropagation();
    });
//--ajax
$('#ok').click(function () {
    $('#mess_block').css('display', 'none');
    $('.page').removeClass('panel-open')
});
//buttonUp
$(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
        $('#buttonUp').fadeIn().addClass('active');
    } else {
        $('#buttonUp').fadeOut().removeClass('active');
    }
});
$('#buttonUp').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 500);
    return false;
});
//endButtonUp
//scrollNav
$('.header__menuWrap').on('click','a',function () {
    var scrollElem = $(this).attr('href').replace('/','');
    console.log($(scrollElem));

    if ($(scrollElem)){
        $('body,html').animate({
            scrollTop: $(scrollElem).offset().top
        }, 500);
    }
    return false;
});
//endScrollNav

// slide();

$('.comment__slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,

    prevArrow: '<button class="navBtn prev slick-arrow" type="button"><svg \n' +
    ' xmlns="http://www.w3.org/2000/svg"\n' +
    ' xmlns:xlink="http://www.w3.org/1999/xlink"\n' +
    ' width="12px" height="20px">\n' +
    '<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"\n' +
    ' d="M0.298,9.286 L9.300,0.297 C9.695,-0.097 10.335,-0.097 10.731,0.297 C11.126,0.690 11.126,1.330 10.731,1.723 L2.443,9.999 L10.730,18.276 C11.125,18.669 11.125,19.308 10.730,19.703 C10.335,20.097 9.694,20.097 9.299,19.703 L0.297,10.714 C-0.092,10.324 -0.092,9.675 0.298,9.286 Z"/>\n' +
    '</svg></button>',

    nextArrow: '<button class="navBtn next slick-arrow" type="button"><svg \n' +
    ' xmlns="http://www.w3.org/2000/svg"\n' +
    ' xmlns:xlink="http://www.w3.org/1999/xlink"\n' +
    ' width="11px" height="20px">\n' +
    '<path fill-rule="evenodd"  fill="rgb(255, 255, 255)"\n' +
    ' d="M10.702,9.286 L1.700,0.297 C1.305,-0.097 0.665,-0.097 0.269,0.297 C-0.126,0.690 -0.126,1.330 0.269,1.723 L8.557,9.999 L0.270,18.276 C-0.125,18.669 -0.125,19.308 0.270,19.703 C0.665,20.097 1.306,20.097 1.701,19.703 L10.703,10.714 C11.092,10.324 11.092,9.675 10.702,9.286 Z"/>\n' +
    '</svg></button>',
    // appendArrows: $('.newsNavWrap'),
});
