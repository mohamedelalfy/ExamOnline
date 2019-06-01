











// question slider



// create pager list items
var sliderImage = $('.question-container');

sliderImage.each(function (index) {
    $('.js__slider__pagers').append('<li>'+(index+1)+'</li>');
});

// set up vars
var sliderPagers       = 'ol.js__slider__pagers li',
    sliderPagersActive = '.js__slider__pagers li.active',
    sliderImages       = '.js_slider_question',
    sliderImagesItem   = '.slider_question_item',
    sliderControlNext  = '.slider_control_next',
    sliderControlPrev  = '.slider_control_prev',
    lastElem           = $(sliderPagers).length-1,
    sliderTarget;

// add css heigt to slider images list
function checkImageHeight() {
    var sliderHeight = $('.question-container:visible').height(); 
    $(sliderImages).css('height', sliderHeight+'px');
};

sliderImage.on('load', function() {
    checkImageHeight();
    $(sliderImages).addClass('loaded')
});
$(window).resize(function(){
    checkImageHeight();
});

// set up first slide
$(sliderPagers).first().addClass('active');
$(sliderImagesItem).hide().first().show();

// transition function
function sliderResponse(sliderTarget) {
    $(sliderImagesItem).fadeOut(300).eq(sliderTarget).fadeIn(300);
    $(sliderPagers).removeClass('active').eq(sliderTarget).addClass('active');
}

// pager controls
$(sliderPagers).on('click', function() {
    if ( !$(this).hasClass('active') ) {
        sliderTarget = $(this).index();
        sliderResponse(sliderTarget);
        resetTiming();
    }
});

// next/prev controls
$(sliderControlNext).on('click', function() {
    sliderTarget = $(sliderPagersActive).index();
    sliderTarget === lastElem ? sliderTarget = 0 : sliderTarget = sliderTarget+1;
    sliderResponse(sliderTarget);
    resetTiming();
});
$(sliderControlPrev).on('click', function() {
    sliderTarget = $(sliderPagersActive).index();
    lastElem = $(sliderPagers).length-1;
    sliderTarget === 0 ? sliderTarget = lastElem : sliderTarget = sliderTarget-1;
    sliderResponse(sliderTarget);
    resetTiming();
});
