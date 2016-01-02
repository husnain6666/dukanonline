/**
 * Created by Khalid on 12/29/2015.
 */
$('.char-counter').each(function(){

    var el = $(this);
    charCounter(el);

});

$('.char-counter').each(function(){

    var el = $(this);
    charCounter(el);

});

function charCounter(el){

    var element = el;
    var counter = $(element).find('input');
    var target = $(counter).attr('data-target');

    $(target).bind("change paste keyup",function(){

        var value = $(this).val();
        var length = value.length;

        counter.val(length);

    });

}