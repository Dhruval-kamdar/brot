var Myprofile = function () {
    var list = function () {

        var form = $('#updateaccount');
        var rules = {
            fname: {required: true},
            lname: {required: true},
            email: {required: true},
            mobile: {required: true, minlength: 10, maxlength: 10},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
        
        $('body').on('click', '.delete', function () {
            var id = $(this).data('id');
            setTimeout(function () {
                $('.yes-sure:visible').attr('data-id', id);
            }, 500);
        });

        $('body').on('click', '.yes-sure', function () {
            var id = $(this).attr('data-id');
            var data = {id: id, _token: $('#_token').val()};
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "myprofile-ajaxaction",
                data: {'action': 'deleteaddress', 'data': data},
                success: function (data) {
                    handleAjaxResponse(data);
                }
            });
        });
    }
    var addadress = function () {
        $('body').on("change", ".country", function () {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "myprofile-ajaxAction",
                data: {'action': 'changecountry', 'id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var statehtml = '<select name="state" id="state" class="nice-select form-control statechnage"><option value="">Select your state</option>';
                    for (var i = 0; i < output.length; i++) {
                        var temp = '';
                        temp = '<option value="' + output[i].id + '">' + output[i].name + '</option>';
                        statehtml = statehtml + temp;
                    }
                    $(".state").html(statehtml + "</option>");
                }
            });
        });



        $('body').on("change", ".statechnage", function () {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                url: baseurl + "myprofile-ajaxAction",
                data: {'action': 'statechnage', 'id': id},
                success: function (data) {
                    var output = JSON.parse(data);
                    var cityhtml = '<select name="city" id="city" class="nice-select form-control state"><option value="">Select your city</option>';
                    for (var i = 0; i < output.length; i++) {
                        var temp = '';
                        temp = '<option value="' + output[i].id + '">' + output[i].name + '</option>';
                        cityhtml = cityhtml + temp;
                    }

                    $(".city").html(cityhtml + "</option>" + css);
                }
            });
        });

        var form = $('#addaddress');
        var rules = {
            addresstype: {required: true},
            houseno: {required: true},
            addressline1: {required: true},
            addressline2: {required: true},
            country: {required: true},
            state: {required: true},
            city: {required: true},
            pincode: {required: true},
            mobileno: {required: true},
            email: {email: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    }
    var editadress = function () {

        var form = $('#editaddress');
        var rules = {
            addresstype: {required: true},
            houseno: {required: true},
            addressline1: {required: true},
            addressline2: {required: true},
            country: {required: true},
            state: {required: true},
            city: {required: true},
            pincode: {required: true},
            mobileno: {required: true},
            email: {email: true},
        };
        handleFormValidate(form, rules, function (form) {
            handleAjaxFormSubmit(form);
        });
    }

    return{
        init: function () {
            list();
        },
        add: function () {
            addadress();
        },
        edit: function () {
            editadress();
        },
    }
}();