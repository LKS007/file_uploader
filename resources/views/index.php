<!DOCTYPE html>
<html lang="en-US" ng-app="employeeRecords">
    <head>
        <title>File Uploader</title>

        <!-- Load Bootstrap CSS -->
        <link href="<?= asset('css/app.css') ?>" rel="stylesheet">        
    </head>
    <body>
        <h2> Download Your file </h2>
        <div  ng-controller="employeesController" class="my_own_controller_div">
            <div ng-if="response_status == 'ok'" class="my_own__complete_div">
                <span>Amazing! It Work!</span> 
                {{my_answer}}
            </div>
            <div ng-hide="{{response_status == 'ok'}}">
            <form name="frmEmployees" class="form-horizontal" novalidate="">
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-1 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{email}}" 
                        ng-model="employee.email" ng-required="true">
                        <span class="help-inline" 
                        ng-show="frmEmployees.email.$invalid && frmEmployees.email.$touched">Valid Email field is required</span>
                    </div>
                </div>

                <div  class="my_own_buttons_div">
                    <input type="file" class="my_own_input_file" name="new_file" ng-files="getTheFiles($files)" ng-model="employee.new_file" required valid-file/>
                    

                    <button type="button" class="btn btn-primary control-label" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmEmployees.$invalid">Save changes</button>
                </div>
            </form>
            </div>
            
            <div ng-if="my_error" class="my_own_danger_zone">
                {{my_error}}
            </div>
        </div>    
    
        <!-- Load Javascript Libraries (AngularJS, JQuery, Bootstrap) -->
        <script src="<?= asset('app/lib/angular/angular.min.js') ?>"></script>
        <script src="<?= asset('js/app.js') ?>"></script>
        
        <!-- AngularJS Application Scripts -->
        <script src="<?= asset('app/app.js') ?>"></script>
        <script src="<?= asset('app/controllers/employees.js') ?>"></script>
    </body>
</html>
