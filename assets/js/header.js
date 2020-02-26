if ("matchMedia" in window) { // Détection
    if (window.matchMedia("(max-width:900px)").matches) {
        $('#dropdownMenu1').addClass('text-light');
    } else {
        $(window).scroll(function () {
            if ($(document).scrollTop() > 10) {
                $('.nav').addClass('affix');
                $('#dropdownMenu1').addClass('text-light');
            } else {
                $('.nav').removeClass('affix');
                $('#dropdownMenu1').removeClass('text-light');
            }
        });
    }
}
