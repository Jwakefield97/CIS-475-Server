var resizeHeaderCol = function(){
    if($(window).width() <= 600) {
        $("#aboutHeader").removeClass("col-2");
        $("#aboutHeader").addClass("col-6");
    } else {
        $("#aboutHeader").removeClass("col-6");
        $("#aboutHeader").addClass("col-2");
    }
};

$(document).ready(function() {
    $("#navbarNavAltMarkup .navbar-nav .about").addClass("active");
    $("#navbarNavAltMarkup .navbar-nav .reservations").removeClass("active");
    $("#navbarNavAltMarkup .navbar-nav .home").removeClass("active");
    $("#navbarNavAltMarkup .navbar-nav .admin").removeClass("active");

    resizeHeaderCol();
    $(window).resize(function() {
        resizeHeaderCol();
    });
});