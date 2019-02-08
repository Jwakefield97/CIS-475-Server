var resizeFormCol = function(){
    if($(window).width() <= 1000) {
        $("#formWrapper").removeClass("col-8");
        $("#formWrapper").addClass("col-12");
    } else {
        $("#formWrapper").removeClass("col-12");
        $("#formWrapper").addClass("col-8");
    }
};
$(document).ready(function() {
    $("#navbarNavAltMarkup .navbar-nav .reservations").addClass("active");
    $("#navbarNavAltMarkup .navbar-nav .home").removeClass("active");
    $("#navbarNavAltMarkup .navbar-nav .about").removeClass("active");

    resizeFormCol();
    $(window).resize(function() {
        resizeFormCol();
    });
});