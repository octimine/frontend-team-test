/**
 * @author : Harisankar.M.R <mrsank@live.in>
 * @date : 29.01.2016
 * @file: EmployeeController.js
 * @path: public/angularjs/controllers/EmployeeController.js
 * @description : EmployeeController for create, update and delete function of the employee data
 */

app.controller('EmployeeController', function ($scope, $http, API_URL) {
    $http.get(API_URL + "employee")
        .success(function (response) {
            $scope.employees = response;
        });

    // modal form
    $scope.toggle = function (modelstate, id) {
        $scope.modelstate = modelstate;
        switch (modelstate) {
            case 'add':
                $scope.form_title = "Add new employee";
                break;
            case 'edit':
                $scope.form_title = "Employee details";
                $scope.id = id;
                $http.get(API_URL + 'employee/' + id).success(function (response) {
                    console.log(response);
                    $scope.employee = response;
                });
                break;
            default:
                break;
        }
        console.log(id);
        $('#empModel').modal('show');
    }

    // Save or update employee data
    $scope.save = function (modelstate, id) {
        var url = API_URL + 'employee';
        if (modelstate == 'edit') {
            url += '/' + id;
        }
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.employee),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (response) {
            console.log(response);
            location.reload();
        }).error(function (response) {
            console.log(response);
            alert('Error occured');
        });
    }

    // delete employee data
    $scope.confirmDelete = function (modelstate, id) {
        var isConfirmDelete = confirm('Are you sure?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'employee/' + id
            }).success(function (response) {
                console.log(response);
                location.reload();
            }).error(function (response) {
                console.log(response);
                alert('Unable to delete the data');
            });
        } else {
            return false;
        }
    }
});