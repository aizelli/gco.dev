/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
 $(document).ready(function () {
 $('#def').hide();
 $('#check').click(function () {
 $('#def').toggle();
 });
 });
 */
$(document).ready(function () {
    $('#def').hide();
    $('#dados').hide();
    $('#oculta').hide();
    
    $("#add").click(function () {
        $("#dados").slideToggle(500);
    });
    $('input[name=filho]:radio').click(function () {

        if ($(this).val() == "1") {
            $('#oculta').slideDown(500);
        } else {
            $('#oculta').slideUp(500);
        }

    });

});

function valueChanged()
{
    if ($('#check').is(":checked"))
        $("#def").slideDown(500);
    else
        $("#def").slideUp(500);
}