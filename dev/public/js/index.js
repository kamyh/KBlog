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

function comment($id)
{
    if(document.getElementById($id).style.display == 'none' || document.getElementById($id).style.display == '') {
        document.getElementById($id).style.display = 'block';
    }else{
        document.getElementById($id).style.display = 'none';
    }
}

//https://twitter.com/intent/tweet?url=http%3A%2F%2Fdisq.us%2F9068kq&text=%22There%27s%20another%20way%20to%20gain%20some%20time%20if%20you%20don%27t%20have%20enough%20for%20writing.%20It%20takes%20a%20bit%20of%E2%80%A6%22%20%E2%80%94%20Jamie%20Whitehorn
function twitter($url,$tweet)
{
    var myWindow = window.open("https://twitter.com/intent/tweet?url=" + $url + "&text=" + $tweet, "_blank", "width=800, height=600");
}