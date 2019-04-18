app.controller("loginController", function($scope){
        
    $scope.reset = function(){ //function to reset the form
        $scope.username = "";
        $scope.password = "";
    };
    $scope.submit = function () {
        return false;
    };

});

$("#login-tab").on("click", function() {
	$("#register").hide();
	$("#login").show();
});

$("#register-tab").on("click", function() {
	$("#login").hide();
	$("#register").show();
});