const settingsForm = $('#settingsForm');
const settingsFormSubmitBtn = settingsForm.find('button[type="submit"]');

$(function () {
   settingsForm.find('#uploadPhotoBtn').on('click', function () {
       settingsForm.find('input[name="avatar"]').click();
   });

   settingsForm.find('input[name="avatar"]').on('change', function () {
       if (this.files && this.files[0]) {
           const reader = new FileReader();

           reader.onload = function (e) {
               settingsForm.find('.avatar img').attr('src', e.target.result);
           }

           reader.readAsDataURL(this.files[0]);
       }
   });

   settingsForm.on('submit', function (e) {
       e.preventDefault();
       $.ajax({
           url: '/func/setting/update-information',
           type: 'POST',
           data: new FormData(this),
           dataType: 'JSON',
           contentType: false,
           processData: false,
           success: function (res) {
                swal.fire('Success', res.message, 'success');
                location.reload();
           },
           error: function (err) {
                const errJSON = err.responseJSON;
                if(errJSON.errors) {
                    const errors = errJSON.errors;
                    $.each(errors, function (field, errMsg) {
                        console.log(1);
                       const Validation = new RegistrationValidation();
                       const input = formInput(settingsForm, 'input', field);

                       Validation.validate(input, errMsg);
                    });
                }
           },
           beforeSend: function () {
               submitBtnBeforeSend(settingsFormSubmitBtn, 'Updating');
           },
           complete: function () {
                submitBtnAfterSend(settingsFormSubmitBtn, 'Update Information');
           }
       });
   });
});
