app.controller('employeesController', function($scope, $http, API_URL) {
    $scope.toggle = function(modalstate, id) {
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                $scope.form_title = "Add New Employee";
                break;
            case 'edit':
                $scope.form_title = "Employee Detail";
                $scope.id = id;
                $http.get(API_URL + 'employees/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.employee = response;
                        });
                break;
            default:
                break;
        }
        console.log(id, "here");
        $('#myModal').modal('show');
    }

    $scope.uploadFile = function(file) {
        console.log(file[0].size);
        console.log($scope.frmEmployees.file);
    }; 

    var formdata = new FormData();
    $scope.getTheFiles = function ($files) {
        angular.forEach($files, function (value, key) {
            formdata.append('new_file', value);
        });
    };

    //save new record / update existing record
    $scope.save = function(modalstate, id) {
        //var url = API_URL + "employees";
        var url = API_URL;
        formdata.append('uploader_email', $scope.employee.email);
        formdata.append('FrontReq', 'Y');
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        
        $http({
            method: 'POST',
            url: url,
            data: formdata,
            headers: {'Content-Type': undefined }
        }).success(function(response) {            
            $scope.response_status = response.status;
            if ($scope.response_status == 'ok') {
                $scope.my_answer = response.message;
            }
            if ($scope.response_status == 'error') {
                $scope.my_error = response.message;
                setTimeout(function(){
                    location.reload();        
                }, 2000);
            }
            
        }).error(function(response) {
            console.log(response);
            alert('This is embarassing. An error has occured. Please check the log for details');
        });
    }
});
