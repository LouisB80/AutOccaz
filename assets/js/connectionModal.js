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
                console.log(response.length);
                if (response.length === 2) {
                    location.assign('http://autocazz.fr/accueil');
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
                }
            }
        })
        return false;
    });
})