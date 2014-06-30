$(document).ready(function() {

    $('.menu').live('click', function() {
        
        if (!$(this).hasClass('on')) {
            $(this).addClass('on');
            $('.push').animate({'right': '250'}, 400);
            $('.sidebar').animate({'right': '0'}, 400);
        } else {
            $(this).removeClass('on');
            $('.push').animate({'right': '0'}, 400);
            $('.sidebar').animate({'right': '-250'}, 400);
        }
    });

});