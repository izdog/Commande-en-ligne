$(document).ready(function(){
    var url = $(location).attr('href');
    var target = $('.nav-item');
        url = url.split('/');
        url = url[url.length-1];
    target.each(function(){
        x = $(this).children().attr('href');
        x = x.split('/');
        x = x[x.length-1];
        if(url === x){
            $(this).addClass('active');
        }
    });

    // PERMET DE D AUGMENTER OU DE DIMINUER LA QUANTITEE

    $('.minus').on('click', function(e){
        e.preventDefault();
        var target = $(this).siblings('input');
        var quantity = parseInt(target.val());
        if(quantity -1 >= 0)
        target.val(quantity - 1);
    });
    $('.plus').on('click', function(e){
        console.log(this);
        e.preventDefault();
        var target = $(this).siblings('input');
        var quantity = parseInt(target.val());
        if(quantity + 1 <= 10)
            target.val(quantity + 1);
    });


});

