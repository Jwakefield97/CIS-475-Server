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
    $("#navbarNavAltMarkup .navbar-nav .admin").removeClass("active");

    resizeFormCol();
    $(window).resize(function() {
        resizeFormCol();
    });

    $('#fromDate').datepicker({
        uiLibrary: 'bootstrap4'
    });
    $('#toDate').datepicker({
        uiLibrary: 'bootstrap4'
    });
});

app.controller("reservationController", function($scope){
    $scope.cities = {
        "Brisbane, Australia": ["City Tours", "Sports", "Cycling", "Museums", "Boating"],
        "Vancouver, Canada": ["Museums", "Sailing", "Beach", "Hiking", "Boating"],
        "New York City, United States": ["Museums", "Theatre", "Parks and Recreation", "City Tours"],
        "Berlin, Germany": ["City Tours", "Museums", "Cycling"],
        "Cancun, Mexico": ["Parks and Recreation", "Beaches", "Boating", "Snorkeling"]
    };
    $scope.reset = function(){ //function to reset the form
        $scope.currentCity = "";
        $scope.adultNum = 0;
        $scope.childrenNum = 0;
        $scope.fromDate = "";
        $scope.toDate = "";
        $scope.email = "";
        $scope.phoneNumber = "";
        $scope.fullName = "";
    };
    $scope.submit = function () {
        return false;
    };
});