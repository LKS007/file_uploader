var app = angular.module('employeeRecords', [])
        .constant('API_URL', 'http://file_uploader.dev/api/v1/');
app.directive('validFile',function(){
  return {
    require:'ngModel',
    link:function(scope,el,attrs,ngModel){
      console.log(el.val(), ngModel)
      //change event is fired when file is selected
      el.bind('change',function(){
        scope.$apply(function(){
          ngModel.$setViewValue(el.val());
          ngModel.$render();
        });
      });
    }
  }
});
