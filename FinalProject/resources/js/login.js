app.controller("loginController", function($scope){
        
    $scope.reset = function(){ //function to reset the form
        $scope.username = "";
        $scope.password = "";
    };
    $scope.submit = function () {
        return false;
    };

});

var resizeFormCol = function(){
    if($(window).width() <= 1000) {
        $("#colWrapper").removeClass("col-4");
        $("#colWrapper").addClass("col-10");
    } else {
        $("#colWrapper").removeClass("col-4");
        $("#colWrapper").addClass("col-10");
    }
};

$(document).ready(function() { 
    resizeFormCol();
    $(window).resize(function() {
        resizeFormCol();
    });

    $("#login-tab").on("click", function() {
        $("#register").hide();
        $("#login").show();
    });
    
    $("#register-tab").on("click", function() {
        $("#login").hide();
        $("#register").show();
    });
});
