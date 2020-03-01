$(function () {
    $('.sign-in-htm').submit(function (event) {
        event.preventDefault();
        let connectionValue = $(this).serialize() + '&connection=true';
        $.ajax({
            method: 'POST',
            url: '/subscribeValidate.php',
            data: connectionValue,
            datatype: 'json',
            success: function (response) {
                console.log(response);
                if (response.length === 2) {
                    location.assign('http://autocazz.fr/accueil');
                } else {
                    $('#userConn').append('<span class="text-danger">' + response['userConnection'] + '</span>')
                    $('#userPass').append('<span class="text-danger">' + response['passConnection'] + '</span>')
                }
            }
        })
        return false;
    });
    $('.sign-up-htm').submit(function (event) {
        event.preventDefault();
        let subcribeValue = $(this).serialize() + '&subscribe=true';
        $.ajax({
            method: 'POST',
            url: '/subscribeValidate.php',
            data: subcribeValue,
            datatype: 'json',
            success: function (response) {
                console.log(response);
                if (response.length === 2) {
                    location.assign('http://autocazz.fr/accueil');
                } else {
                    $('#lastNameInscr').append('<span class="text-danger">' + response['lastName'] + '</span>')
                    $('#firstNameInscr').append('<span class="text-danger">' + response['firstName'] + '</span>')
                    $('#mailInscr').append('<span class="text-danger">' + response['mail'] + '</span>')
                    $('#passValid').append('<span class="text-danger">' + response['passwordIns'] + '</span>')
                    $('#phoneNumb').append('<span class="text-danger">' + response['phoneNumber'] + '</span>')
                }
            }
        })
        return false;
    });
})