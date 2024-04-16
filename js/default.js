$(function() {
    $( ".datepicker" ).datepicker($.datepicker.regional['et'] = {
        closeText: 'Sulge',
        prevText: 'Eelnev',
        nextText: 'Järgnev',
        currentText: 'Täna',
        monthNames: ['Jaanuar','Veebruar','Märts','Aprill','Mai','Juuni','Juuli','August','September','Oktoober','November','Detsember'],
        monthNamesShort: ['Jaan', 'Veebr', 'Märts', 'Apr', 'Mai', 'Juuni','Juuli', 'Aug', 'Sept', 'Okt', 'Nov', 'Dets'],
        dayNames: ['Pühapäev', 'Esmaspäev', 'Teisipäev', 'Kolmapäev', 'Neljapäev', 'Reede', 'Laupäev'],
        dayNamesShort: ['Pühap', 'Esmasp', 'Teisip', 'Kolmap', 'Neljap', 'Reede', 'Laup'],
        dayNamesMin: ['P','E','T','K','N','R','L'],
        weekHeader: 'Sm',
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    
});

$(document).ready(function() {
    setTimeout(function () {
        $('.alert').fadeOut('slow');
    }, 5000);
});