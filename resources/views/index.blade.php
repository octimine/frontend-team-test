<!DOCTYPE html>
<html lang="en" ng-app="getEmployee">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Larvel 5.3 with Angular JS</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

    <script src="{{ asset('angularjs/app.js') }}"></script>
    <script src="{{ asset('angularjs/controllers/EmployeeController.js') }}"></script>


    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" class="index">

<div class="container">
    <h2>Sample Application</h2>

    <div ng-controller="EmployeeController">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>
                    <button id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)">Add</button>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="employee in employees">
                <td>@{{ employee.employee_id }}</td>
                <td>@{{ employee.name }}</td>
                <td>@{{ employee.email }}</td>
                <td>@{{ employee.branch }}</td>
                <td>
                    <button class="btn btn-warning btn-xs btn-details" ng-click="toggle('edit', employee.id)">Edit
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(employee.id)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>