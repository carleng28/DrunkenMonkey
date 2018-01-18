/**
 * Created by Sada Rao on 1/17/2018.
 */

function changeClass(){

    $('.ratings input').change(function () {
        var $radio = $(this);
        $('.ratings .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
        console.log();
    });

    var radios = document.getElementsByName('ratings');

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            //alert(radios[i].value);

            // only one radio can be logically checked, don't check the rest
            break;
        }

    }



}


