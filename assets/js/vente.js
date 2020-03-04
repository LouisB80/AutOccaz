$(document).ready(function () {

    var current_fs, next_fs, previous_fs;
    var opacity;
    var clickedBrand = '';
    var step = 0;
    var tabValue = [];
    //Select marque
    $('#brand').change(function () {
        clickedBrand = 'idBrand=' + $(this).val();
        console.log(clickedBrand);
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
        console.log(dataValue)
        $.ajax({
            method: 'POST',
            url: 'carsValidate.php',
            data: dataValue,
            datatype: 'json',
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                console.log(data);
                if (data.error.length === 0) {
                    step++;
                    $.map(data.validValue, function (value) {
                        tabValue.push(value);
                    })
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
                    (data['immat']) ? $('#immat').after('<span class="text-danger">' + data['immat'] + '</span>') : false;
                    (data['identifiedNumber']) ? $('#identifiedNumber').after('<span class="text-danger">' + data['identifiedNumber'] + '</span>') : false;
                    (data['year']) ? $('#year').after('<span class="text-danger">' + data['year'] + '</span>') : false;
                    (data['brand']) ? $('#brand').parent('div').after('<span class="text-danger">' + data['brand'] + '</span>') : false;
                    (data['model']) ? $('#model').parent('div').after('<span class="text-danger">' + data['model'] + '</span>') : false;
                    (data['fiscalPower']) ? $('#fiscalPower').after('<span class="text-danger">' + data['fiscalPower'] + '</span>') : false;
                    (data['power']) ? $('#power').after('<span class="text-danger">' + data['power'] + '</span>') : false;
                    (data['mileage']) ? $('#mileage').after('<span class="text-danger">' + data['mileage'] + '</span>') : false;
                    (data['firstRegistration']) ? $('#firstRegistration').after('<span class="text-danger">' + data['firstRegistration'] + '</span>') : false;
                    (data['gearBox']) ? $('#gearBox').after('<span class="text-danger">' + data['gearBox'] + '</span>') : false;
                    (data['fuel']) ? $('#fuel').after('<span class="text-danger">' + data['fuel'] + '</span>') : false;
                    (data['color']) ? $('#color').after('<span class="text-danger">' + data['color'] + '</span>') : false;
                    (data['seat']) ? $('#seat').after('<span class="text-danger">' + data['seat'] + '</span>') : false;
                    (data['doors']) ? $('#doors').after('<span class="text-danger">' + data['doors'] + '</span>') : false;
                    (data['firstHand']) ? $('#firstHand').after('<span class="text-danger">' + data['firstHand'] + '</span>') : false;
                    (data['rent']) ? $('#rent').after('<span class="text-danger">' + data['rent'] + '</span>') : false;
                    (data['sell']) ? $('#sell').after('<span class="text-danger">' + data['sell'] + '</span>') : false;
                    (data['smoker']) ? $('#smoker').after('<span class="text-danger">' + data['smoker'] + '</span>') : false;
                    (data['uploadImg']) ? $('#uploadImg').after('<span class="text-danger">' + data['uploadImg'] + '</span>') : false;
                }
            }
        })
    });

    //Bouton d'envoi
    $('.submit').click(function (e) {
        e.preventDefault();
        let dataValue = 'immat=' + tabValue[0] + '&identifiedNumber=' + tabValue[1] +'&year=' + tabValue[2] +'&brand' + tabValue[3] +'&model=' + tabValue[4] +'&fiscalPower=' + tabValue[5] +'&power=' + tabValue[6] +'&mileage=' + tabValue[7] +'&firstRegistration=' + tabValue[8] +'&gearBox=' + tabValue[9] +'&fuel=' + tabValue[10] +'&color=' + tabValue[11] +'&seat=' + tabValue[12] +'&doors=' + tabValue[13] +'&firstHand=' + tabValue[14] +'&rent=' + tabValue[15] +'&sell=' + tabValue[16] +'&smoker=' + tabValue[17] + '&submit=true';
        $.ajax({
            method: 'POST',
            url: 'carsValidate.php',
            data: dataValue,
            datatype: 'json',
            success: function(response) {
                   console.log(JSON.parse(response));             
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