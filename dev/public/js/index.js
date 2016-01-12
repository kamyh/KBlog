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

function languageChange($url) {
    var e = document.getElementById("langSelector");
    var lang = e.options[e.selectedIndex].value;

    window.location = $url + lang;
}

function comment($id) {
    if (document.getElementById($id).style.display == 'none' || document.getElementById($id).style.display == '') {
        document.getElementById($id).style.display = 'block';
    } else {
        document.getElementById($id).style.display = 'none';
    }
}

function twitter($url, $tweet) {
    var myWindow = window.open("https://twitter.com/intent/tweet?url=" + $url + "&text=" + $tweet, "_blank", "width=800, height=600");
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(element).select();
    document.execCommand("copy");
    $temp.remove();

    alert('Image URL has been copy to your clipboard!');
}

function showPreview() {
    if (document.getElementById('sec-preview').style.display == 'none' || document.getElementById('sec-preview').style.display == '') {
        document.getElementById('sec-preview').style.display = 'block';
    }

    $content = CKEDITOR.instances['editor-content'].getData();
    document.getElementById('prev_content').innerHTML = $content;
}

function hidePreview() {
    document.getElementById('sec-preview').style.display = 'none';
}