var resizeFormCol = function(){
    if($(window).width() <= 1000) {
        $("#colWrapper").removeClass("col-6");
        $("#colWrapper").addClass("col-10");
    } else {
        $("#colWrapper").removeClass("col-6");
        $("#colWrapper").addClass("col-10");
    }
};

$(document).ready(function() { 
    resizeFormCol();
    $(window).resize(function() {
        resizeFormCol();
    });
});
