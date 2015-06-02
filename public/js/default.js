/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $('#uf').change(function () {
        var baseUrl = document.location.origin + '/gco.dev/public/dropdown_cidades/';
        $.get(baseUrl + $(this).val(), {option: $(this).val()}, function (data) {
            $('#cidade').empty();
            $.each(data, function (key, element) {
                $('#cidade').append("<option value='" + key + "'>" + element + "</option>");
            });
        });
    });

    $('.bxslider').bxSlider();
});

function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(44.5403, -78.5463),
          zoom: 5,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);