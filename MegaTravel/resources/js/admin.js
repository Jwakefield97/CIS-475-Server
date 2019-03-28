var resizeFormCol = function(){
    if($(window).width() <= 1000) {
        $("#formWrapper").removeClass("col-4");
        $("#formWrapper").addClass("col-12");
    } else {
        $("#formWrapper").removeClass("col-12");
        $("#formWrapper").addClass("col-4");
    }
};

$(document).ready(function() {
    $("#navbarNavAltMarkup .navbar-nav .admin").addClass("active");
    $("#navbarNavAltMarkup .navbar-nav .about").removeClass("active");
    $("#navbarNavAltMarkup .navbar-nav .reservations").removeClass("active");
    $("#navbarNavAltMarkup .navbar-nav .home").removeClass("active");

    resizeFormCol();
    $(window).resize(function() {
        resizeFormCol();
    });
});

app.controller("adminController", function($scope){
        
    $scope.reset = function(){ //function to reset the form
        $scope.username = "";
        $scope.password = "";
    };
    $scope.submit = function () {
        return false;
    };

});