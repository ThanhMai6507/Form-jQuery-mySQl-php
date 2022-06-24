$(document).ready(function() {
    $("#register-form").validate({
        onfocusout: false,
        onkeyup: false,
        onclick: false,
        
        rules: {
            fullname: {
                required: true,
                maxlength: 15
            },
            // "fullname": {
            //     required: true,
            //     maxlength: 15
            // },

            email: {
                required: true,
                maxlength: 15,
                email: true
            },
            address: {
                required: true,
                maxlength: 15
            },
            phoneNumber: {
                required: true,
                maxlength: 15
            },
            birthdayDate: {
                required: true,
                maxlength: 15,
                date: true
            },
            fullname: {
                required: true,
                maxlength: 15
            },
            inlineRadioOptions: {
                required: true
            }
        }
    });
});

