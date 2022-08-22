const loginForm = $('#login-form');
const logintSubmitBtn = loginForm.find('button[type="submit"]');
const notification = loginForm.find('#notification');
const api = '/func/auth/';

$(function () {
    loginForm.on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: api + 'login',
            type: 'POST',
            data: loginForm.serialize(),
            dataType: 'JSON',
            success: function (res) {
                resetForm(loginForm);
                notification.html(alertMessage(res.message, 'success'));
                setTimeout(function () {
                    window.location.href = '/';
                }, 1000);
            },
            error: function (err) {
                const errJSON = err.responseJSON;
                const Validation = new RegistrationValidation();

                if(errJSON.errors) {
                    const errors = errJSON.errors;

                    $.each(errors, function (field, message) {
                        const input = formInput(loginForm, 'input', field);
                        Validation.validate(input, message);
                    });
                }

                if(errJSON.message) {
                    console.log(errJSON.message);
                    notification.html(alertMessage(errJSON.message, 'danger'));
                }
            },
            beforeSend: function () {
                removeInputValidationErrors();
                submitBtnBeforeSend(logintSubmitBtn, 'Logging In')
            },
            complete: function () {
                submitBtnAfterSend(logintSubmitBtn, 'Login')
            }
        })
    });
})
