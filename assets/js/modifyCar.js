$(document).ready(function () {
    var clickedBrand = '';
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
})