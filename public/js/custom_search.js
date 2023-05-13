$("document").ready(function () {
    $("#from_date_en").datepicker({
        dateFormat: 'yy-mm-dd',
        autoClose: true,
        changeMonth: true,
        changeYear: true,
        maxDate:0
    });

    $("#to_date_en").datepicker({
        dateFormat: 'yy-mm-dd',
        autoClose: true,
        changeMonth: true,
        changeYear: true,
        maxDate:0
    });

});

$('.englishDatePicker').inputmask('yyyy-mm-dd', { 'placeholder': 'YYYY-MM-DD' })


$('#from_date').on('change', function () {
    const date = $(this).val();
    const today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    if(date > today){
        $('#error').html('Date must be less than today\'s date');
        $('#check_data_modal').modal('show');
        $('#from_date').val('');
        $('#btn-search').prop('disabled',true);
        setTimeout(function() {
            $('#check_data_modal').modal('hide');
        }, 5000);
    }else{
        $('#btn-search').prop('disabled',false);
    }
})
$('#to_date').on('change', function () {
    const date = $(this).val();
    const today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    if(date > today){
        $('#error').html('Date must be less than today\'s date');
        $('#check_data_modal').modal('show');
        $('#to_date').val('');
        $('#btn-search').prop('disabled',true);
        setTimeout(function() {
            $('#check_data_modal').modal('hide');
        }, 5000);
    }else{
        $('#btn-search').prop('disabled',false);
    }
})


$(function () {
    $('.select2').select2()
});
$('.select2-single').select2({
    // placeholder: placeholder,
    width: '100%',
    containerCssClass: ':all:'
});