$(function () {
    $('.sign-in-htm').submit(function (event) {
        event.preventDefault();
        let connectionValue = $(this).serialize() + '&connection=true';
        $.ajax({
            method: 'POST',
            url: 'subscribeValidate.php',
            data: connectionValue,
            datatype: 'json',
            success: function (response) {
                var data = JSON.parse(response);
                console.log(data);
                if ($.isEmptyObject(data)) {
                    location.assign('/accueil');
                } else {
                    $('span').empty();
                    (data['userConnection']) ? $('#userConnection').after('<span class="text-danger">' + data['userConnection'] + '</span>') : false;
                    (data['passConnection']) ? $('#passConnection').after('<span class="text-danger">' + data['passConnection'] + '</span>') : false;
                }
            }
        })
        return false;
    });
    $('.sign-up-htm').submit(function (event) {
        event.preventDefault();
        let subscribeValue = $(this).serialize() + '&subscribe=true';
        $.ajax({
            method: 'POST',
            url: 'subscribeValidate.php',
            data: subscribeValue,
            datatype: 'json',
            success: function (response) {
                var data = JSON.parse(response);
                if ($.isEmptyObject(data)) {
                    location.assign('/accueil');
                } else {
                    $('span').empty();
                    (data['lastName']) ? $('#lastNameInscription').after('<span class="text-danger">' + data['lastName'] + '</span>') : false;
                    (data['firstName']) ? $('#firstNameInscription').after('<span class="text-danger">' + data['firstName'] + '</span>') : false;
                    (data['mail']) ? $('#mailInscription').after('<span class="text-danger">' + data['mail'] + '</span>') : false;
                    (data['password']) ? $('#passInscription').after('<span class="text-danger">' + data['password'] + '</span>') : false;
                    (data['passwordIns']) ? $('#passValidation').after('<span class="text-danger">' + data['passwordIns'] + '</span>') : false;
                    (data['phoneNumber']) ? $('#phoneNumber').after('<span class="text-danger">' + data['phoneNumber'] + '</span>') : false;
                }
            }
        })
        return false;
    });
})