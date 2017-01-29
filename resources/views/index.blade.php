<!DOCTYPE html>
<html lang="en" ng-app="getEmployee">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Larvel 5.3 with Angular JS</title>
    <!-- Font awesome minified CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- AngularJS files -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.1/angular-material.min.js"></script>

    <!-- Local angular files for Employee data operations -->
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
    <h2>Laravel 5.3 CRUD API with AngularJS</h2>

    <div ng-controller="EmployeeController">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Emp ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Branch</th>
                <th>
                    <button title="Insert" id="btn-add" class="btn btn-success btn-xs" ng-click="toggle('add', 0)"><i
                                class="fa fa-plus fa-2x" aria-hidden="true"></i></button>
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
                    <button title="Edit" class="btn btn-warning btn-xs btn-details"
                            ng-click="toggle('edit', employee.id)"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button>
                    <button title="Delete" class="btn btn-danger btn-xs btn-delete"
                            ng-click="confirmDelete('delete', employee.id)">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="modal fade" id="empModel" tabindex="1" role="dialog" aria-labelledby="empModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button title="Close" type="button" class="close" data-dismiss="modal" aria-label="close">
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </button>
                        <h4>@{{ form_title }}</h4>
                    </div>
                    <div class="modal-body">
                        <form name="frmEmployee" class="form-horizontal" novalidate="">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Emp ID</label>
                                <div class="col-sm-9">
                                    <input type="text" name="employee_id" id="employee_id" class="form-control"
                                           placeholder="Employee ID" value="@{{ employee_id }}"
                                           ng-model="employee.employee_id" ng-required="true">
                                    <span style="color: #ff0039;"
                                          ng-show="frmEmployee.employee_id.$invalid && frmEmployee.employee_id.$touched">Employee ID required</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="name" class="form-control"
                                           placeholder="Employee Name" value="@{{ name }}"
                                           ng-model="employee.name" ng-required="true">
                                    <span style="color: #ff0039;"
                                          ng-show="frmEmployee.name.$invalid && frmEmployee.name.$touched">Employee Name required</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="email" class="form-control"
                                           placeholder="Employee email" value="@{{ email }}"
                                           ng-model="employee.email" ng-required="true">
                                    <span style="color: #ff0039;"
                                          ng-show="frmEmployee.email.$invalid && frmEmployee.email.$touched">Employee Email required</span>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 control-label">Branch</label>
                                <div class="col-sm-9">
                                    <input type="text" name="branch" id="branch" class="form-control"
                                           placeholder="Employee Branch" value="@{{ branch }}"
                                           ng-model="employee.branch" ng-required="true">
                                    <span style="color: #ff0039;"
                                          ng-show="frmEmployee.branch.$invalid && frmEmployee.branch.$touched">Employee Branch required</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modelstate, id)"
                                ng-disabled="frmEmployee.$invalid">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>