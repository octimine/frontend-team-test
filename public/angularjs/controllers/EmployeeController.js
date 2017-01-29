
app.controller('EmployeeController', function ($scope, $http, API_URL) {
    $http.get(API_URL + "employee")
        .success(function (response) {
            $scope.employees = response;
        });
});