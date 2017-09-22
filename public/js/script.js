$(document).ready(function () {
    let selector = '.navbar li';
    $(selector).on('click', function () {
        $(selector).removeClass('active');
        $(this).addClass('active')
    });
    $('.counter').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-count');

        $({ countNum: $this.text() }).animate({
            countNum: countTo
        },
            {

                duration: 8000,
                easing: 'linear',
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                    //alert('finished');
                }

            });
    });
});

window.sr = ScrollReveal({
    reset: true,
    mobile: true
});
sr.reveal('.img-animated-section1', {
    duration: 800
}, 350);

sr.reveal('.img-animated-section2', {
    duration: 800
},350);
sr.reveal('.img-animated-section3', {
    duration: 800
}, 350);
sr.reveal('.img-animated-section4', {
    duration: 800
}, 350);

sr.reveal('.img-animated-section5', {
    duration: 800
}, 350);

sr.reveal('.img-animated-footer', {
    duration: 800
}, 350);