$(function () {
    var pull = $('#pull');
    menu = $('nav ul');
    menuHeight = menu.height();
    $(pull).on('click', function (e) {
        e.preventDefault();
        menu.slideToggle();
    });
    $(window).resize(function () {
        var w = $(window).width();
        if (w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});

//nav bar
$(function () {
    $('a.menu, .js-connect').click(function (e) {
        e.preventDefault();
        $('body, html').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 750);
    });
});

function languageChange() {
    var e = document.getElementById("langSelector");
    var lang = e.options[e.selectedIndex].value;

    window.location = '/language/' + lang;
}