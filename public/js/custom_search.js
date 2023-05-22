$("document").ready(function () {
    $("#from_date").datepicker({
        dateFormat: 'yy-mm-dd',
        autoClose: true,
        changeMonth: true,
        changeYear: true,
        maxDate:0
    });

    $("#to_date").datepicker({
        dateFormat: 'yy-mm-dd',
        autoClose: true,
        changeMonth: true,
        changeYear: true,
        maxDate:0
    });

    $(".startDate").datepicker({
        dateFormat: 'yy-mm-dd',
        autoClose: true,
        changeMonth: true,
        changeYear: true,
        minDate:0
    });
    $(".endDate").datepicker({
        dateFormat: 'yy-mm-dd',
        autoClose: true,
        changeMonth: true,
        changeYear: true,
        minDate:0
    });


});

$('.englishDatePicker').inputmask('yyyy-mm-dd', { 'placeholder': 'YYYY-MM-DD' })


