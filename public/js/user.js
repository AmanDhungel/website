$('#role_level').on('change', function () {
    var role_level = $(this).val();
    if(role_level !== ''){
            $('#userTypeBlock').show();
            $('#role_id').prop('required',true);
    }
    // if(role_level == 6){
    //     var clientCode = $(this).val();
    //     var roleLevel = document.getElementById("role_level").value;
    //     if(clientCode !== '' && roleLevel == 6) {
    //         var token = $('meta[name="csrf-token"]').attr('content');
    //         $.post(site_url + '/app/get_role_list', {
    //             clientCode: clientCode, roleLevel: roleLevel, _token: token
    //         }, function (status) {
    //             $('#role_id').html(status);
    //             $('#role_id').prop('disabled', false);
    //         });
    //     }
    // }

})

$('#province_code').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("role_level").value;
    if(clientCode !== '' && roleLevel == 1) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('#role_id').html(status);
            $('#role_id').prop('disabled', false);
        });
    }

})

$('#district_code').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("role_level").value;
    if(clientCode !== '' && roleLevel == 2) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('#role_id').html(status);
            $('#role_id').prop('disabled', false);
        });
    }

})

$('#local_body_code').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("role_level").value;
    if(clientCode !== '' && roleLevel == 3) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('#role_id').html(status);
            $('#role_id').prop('disabled', false);
        });
    }

})

$('#ward_no').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("role_level").value;
    var localBodyCode = document.getElementById("local_body_code").value;
    if(clientCode !== '' && roleLevel == 4) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel,localBodyCode : localBodyCode, _token: token
        }, function (status) {
            $('#role_id').html(status);
            $('#role_id').prop('disabled', false);
        });
    }

})
$('#schoolList').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("role_level").value;
    if(clientCode !== '' && roleLevel == 5) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('#role_id').html(status);
            $('#role_id').prop('disabled', false);
        });
    }

})

// $('#addUerForm').validate({
//     rules: {
//         name_np: {
//             required: true,
//         },
//         name_en: {
//             required: true
//         },
//         province_code: {
//             required: true
//         },
//         district_code: {
//             required: true
//         },
//         local_body_code: {
//             required: true
//         },
//         ward_no: {
//             required: true
//         },
//         teacher_level_id: {
//             required: true
//         },
//
//     },
//     messages: {
//         name_en: {
//             required: 'अंग्रेजी नाम  अनिवार्य छ ।',
//         },
//         name_np: {
//             required: 'नेपाली नाम  अनिवार्य छ ।',
//         },
//         province_code: {
//             required: 'प्रदेश  अनिवार्य छ ।',
//         },
//         district_code: {
//             required: 'जिल्ला  अनिवार्य छ ।',
//         },
//         local_body_code: {
//             required: 'स्थानिय तह  अनिवार्य छ ।',
//         },
//         ward_no: {
//             required: 'वडा नं. अनिवार्य छ ।',
//         },
//
//     },
//     errorElement: 'span',
//     errorPlacement: function (error, element) {
//         error.addClass('invalid-feedback');
//         element.closest('.form-group').append(error);
//     },
//     highlight: function (element, errorClass, validClass) {
//         $(element).addClass('is-invalid');
//     },
//     unhighlight: function (element, errorClass, validClass) {
//         $(element).removeClass('is-invalid');
//     }
// });

$(document).ready(function($) {

    $('#addUerForm').on('submit', function(e){
        $("#addModal").modal('hide');
        $(".passwordUpdate").modal('hide');
        $("#dataSubmitModal").modal('show');
        e.preventDefault();
        // document.getElementById("addMore").value = 1
        $.ajax({
            type:'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: $(this).attr('action'),
            success: (response) => {
                if (response) {
                    window.location.href = '';
                }
            },
            error: function(response) {
                window.location.href = '';
            }
        });
    });


})

$('#role_level').on('change', function () {
    var role_level = $(this).val();
    if(role_level !== ''){
        $('#userTypeBlock').show();
        $('#role_id').prop('required',true);
    }
    // if(role_level == 6){
    //     var clientCode = $(this).val();
    //     var roleLevel = document.getElementById("role_level").value;
    //     if(clientCode !== '' && roleLevel == 6) {
    //         var token = $('meta[name="csrf-token"]').attr('content');
    //         $.post(site_url + '/app/get_role_list', {
    //             clientCode: clientCode, roleLevel: roleLevel, _token: token
    //         }, function (status) {
    //             $('#role_id').html(status);
    //             $('#role_id').prop('disabled', false);
    //         });
    //     }
    // }

})

$('.provinceList').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("edit_role_level").value;
    if(clientCode !== '' && roleLevel == 1) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('.roleList').html(status);
            $('.roleList').prop('disabled', false);
        });
    }

})

$('.districtList').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("edit_role_level").value;
    if(clientCode !== '' && roleLevel == 2) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('.roleList').html(status);
            $('.roleList').prop('disabled', false);
        });
    }

})

$('.localBodyList').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("edit_role_level").value;
    if(clientCode !== '' && roleLevel == 3) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('.roleList').html(status);
            $('.roleList').prop('disabled', false);
        });
    }

})

$('.wardList').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("edit_role_level").value;
    if(clientCode !== '' && roleLevel == 4) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('.roleList').html(status);
            $('.roleList').prop('disabled', false);
        });
    }

})
$('.schoolList').on('change', function () {
    var clientCode = $(this).val();
    var roleLevel = document.getElementById("edit_role_level").value;
    if(clientCode !== '' && roleLevel == 5) {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.post(site_url + '/app/get_role_list', {
            clientCode: clientCode, roleLevel: roleLevel, _token: token
        }, function (status) {
            $('.roleList').html(status);
            $('.roleList').prop('disabled', false);
        });
    }

})
$('#mobile').inputmask('9999999999', { 'placeholder': '98xxxxxxxx' })
$('#mobile').on('change', function () {
    var mobile = $(this).val();
    var login_user_type = 'user';
    if (mobile !== '') {
        $.post(site_url + '/check_mobile', {
            mobile: mobile, login_user_type: login_user_type, _token: $('meta[name="csrf-token"]').attr('content')
        }, function (status) {
            if (status.status == true) {
                $('#error').html(status.message);
                $('#check_data_modal').modal('show');
                $('#mobile').val('');
                $('#btn-add').prop('disabled', true);
                setTimeout(function () {
                    $('#check_data_modal').modal('hide');
                }, 5000);
            } else {
                $('#btn-add').prop('disabled', false);
            }
        });
    }

})

$('#credentialForm').validate({
    messages: {
        login_user_name: {
            required: 'प्रयोगकर्ता नाम  अनिवार्य छ ।',
        },
        mobile_no: {
            required: 'मोबाइल न.  अनिवार्य छ ।',
        },
        email: {
            required: 'इमेल ठेगाना  अनिवार्य छ ।',
        }

    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});