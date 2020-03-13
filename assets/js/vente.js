$(document).ready(function () {
    var current_fs, next_fs, previous_fs;
    var opacity;
    var clickedBrand = '';
    var step = 0;
    var tabValue = {};

    //Select Model
    $('#brand').change(function () {
        clickedBrand = 'idBrand=' + $(this).val();
        $.ajax({
            method: 'POST',
            url: 'getModels.php',
            data: clickedBrand,
            success: function (response) {
                var datas = JSON.parse(response);
                console.log(datas);
                $('#model').empty()
                $.each(datas, function (key, data) {
                    $('#model').append('<option value="' + data['id'] + '">' + data['model'] + '</option>')
                });
            }
        });
    })

    //Bouton suivant
    $(".next").click(function (e) {
        e.preventDefault();
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        let dataValue = $(this).parent('fieldset').serialize() + '&step=' + step + '&subscribe=true';
        $.ajax({
            method: 'POST',
            url: 'carsValidate.php',
            data: dataValue,
            datatype: 'json',
            success: function (response) {
                var data = JSON.parse(response);
                if (data.error.length === 0) {
                    step++;
                    for (let[key, value] of Object.entries(data.validValue)) {
                        tabValue[key] = value;
                    }
                    ;
                    console.log(tabValue);
                    //Add Class Active
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({opacity: 0}, {
                        step: function (now) {
                            // for making fielset appear animation
                            opacity = 1 - now;
                            current_fs.css({
                                'display': 'none',
                                'position': 'relative'
                            });
                            next_fs.css({'opacity': opacity});
                        },
                        duration: 600
                    });
                    return false;
                } else {
                    $('span').empty();
                    (data.error['immat']) ? $('#immat').after('<span class="text-danger">' + data.error['immat'] + '</span>') : false;
                    (data.error['identifiedNumber']) ? $('#identifiedNumber').after('<span class="text-danger">' + data.error['identifiedNumber'] + '</span>') : false;
                    (data.error['year']) ? $('#year').after('<span class="text-danger">' + data.error['year'] + '</span>') : false;
                    (data.error['brand']) ? $('#brand').parent('div').after('<span class="text-danger">' + data.error['brand'] + '</span>') : false;
                    (data.error['model']) ? $('#model').parent('div').after('<span class="text-danger">' + data.error['model'] + '</span>') : false;
                    (data.error['fiscalPower']) ? $('#fiscalPower').after('<span class="text-danger">' + data.error['fiscalPower'] + '</span>') : false;
                    (data.error['power']) ? $('#power').after('<span class="text-danger">' + data.error['power'] + '</span>') : false;
                    (data.error['mileage']) ? $('#mileage').after('<span class="text-danger">' + data.error['mileage'] + '</span>') : false;
                    (data.error['firstRegistration']) ? $('#firstRegistration').after('<span class="text-danger">' + data.error['firstRegistration'] + '</span>') : false;
                    (data.error['gearBox']) ? $('#gearBox').after('<span class="text-danger">' + data.error['gearBox'] + '</span>') : false;
                    (data.error['fuel']) ? $('#fuel').after('<span class="text-danger">' + data.error['fuel'] + '</span>') : false;
                    (data.error['color']) ? $('#color').after('<span class="text-danger">' + data.error['color'] + '</span>') : false;
                    (data.error['seat']) ? $('#seat').after('<span class="text-danger">' + data.error['seat'] + '</span>') : false;
                    (data.error['doors']) ? $('#doors').after('<span class="text-danger">' + data.error['doors'] + '</span>') : false;
                    (data.error['firstHand']) ? $('#firstHand').after('<span class="text-danger">' + data.error['firstHand'] + '</span>') : false;
                    (data.error['rent']) ? $('#rent').after('<span class="text-danger">' + data.error['rent'] + '</span>') : false;
                    (data.error['sell']) ? $('#sell').after('<span class="text-danger">' + data.error['sell'] + '</span>') : false;
                    (data.error['smoker']) ? $('#smoker').after('<span class="text-danger">' + data.error['smoker'] + '</span>') : false;
                    (data.error['price']) ? $('#price').after('<span class="text-danger">' + data.error['price'] + '</span>') : false;
                }
            }

        });
    });
    //Bouton d'envoi
    $('.send').click(function () {
//        let dataValue = JSON.stringify(tabValue);
        var dataValue = '';
        for (let[key, value] of Object.entries(tabValue)) {
            dataValue += key + '=' + value + '&';
        };
        $.ajax({
            method: 'POST',
            url: 'createCar.php',
            data: dataValue,
            datatype: 'json',
            success: function (response) {
                console.log(JSON.parse(response));
                if (response) {
                    $('#hiddenInput').val(response);
                }
                return false;
            }
        });
    });
    //Téléchargement des images
    $('#upload').on('click', function () {
        var formData = new FormData();
        var fileData = $('#fileUpload')[0].files[0];
        formData.append('picture', fileData);
        formData.append('carId', $('#hiddenInput').val());
        $.ajax({
            method: 'POST',
            url: 'upload.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
            }
        });
    });
    //Bouton precedent
    $(".previous").click(function () {
        step--;
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    //Bouton radio
    $('.radio-group .radio').click(function () {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
});