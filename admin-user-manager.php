<html>
    <head>
        <title>
      User Manager
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="jq/jquery-1.8.2.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="jq/angular.min.js"></script> 
     <script>
        var varModule = angular.module("ourmodule", []);
        varModule.controller("ourController", function($scope, $http) {
             $scope.jsonArray; //just declared
             $scope.jsonArrayy; //just declared
             $scope.jsonArraySelected; 
             $scope.uid;//just declared
            $scope.doFetchCat = function() {

                $http.get("admin-user-cat.php").then(okFx, notOkFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonArray = response.data; 
                    $scope.selObject = $scope.jsonArray[0]; 
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }
            }
              $scope.doFetchSelected = function() {
                //alert($scope.selObject.mobile);
                $http.get("admin-user-select.php?category=" + $scope.selObject.category ).then(okFx, notOkFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));
                    $scope.jsonArraySelected = response.data;
                    alert($scope.jsonArraySelected);
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }
               


            }
                              //====================delete===================================================
                $scope.doDel=function(user)
                {
                    //$scope.uid=$scope.jsonArray[i].uid;
                    $http.get("admin-user-delete.php?uid="+user).then(okFx,notOkFx);
                    function okFx(response)
                    {
                        alert(JSON.stringify(response.data));
                       
                          $scope.jsonArray = response.data;
                       
                         $scope.jsonArray.slice(user,1);
                      
                        $scope.object=" ";
                          //$scope.doFetchCat();
                        
                    }
                    function notOkFx(response)
                    {
                        alert(response.data);
                    }
                }
                //----------block record of user------------------------------------
             $scope.doBlock = function(item) {
                $http.get("admin-block.php?uid=" + item).then(ok,notok);
                function ok(response) {
                    alert("User blocked successfully")
                    $scope.jsonArray = response.data;
                    $scope.object=" ";
                }            
                function notok(response) {
                    alert(response.data);
                }
			}
             //----------unblock record of user------------------------------------
             $scope.doUnblock = function(item) {
                $http.get("admin-unblock.php?uid=" + item).then(ok,notok);
                function ok(response) {
                    alert("User unblocked successfully")
                    $scope.jsonArray = response.data;
                    $scope.object=" ";
                }            
                
                function notok(response) {
                    alert(response.data);
                }
			}
                 
        });
        </script>
    </head>
    <body ng-app="ourmodule" ng-controller="ourController" ng-init="doFetchCat(); ">
        <nav class="navbar navbar-expand-sm navbar-dark bg-info ">
        <a href="#" class="navbar-brand">Manpower</a>
       
        </nav>
        <br>
        <center>
        <div class="row">
            <div class="col-md-12 ">
               <center>
                <label class=" h4 offset-1">Select Category : </label>
                <select class="wid" ng-model="selObject" ng-options="obj.category for obj in jsonArray">SELECT</select></center>

            </div>
           
        </div>
        </center>
        <div class="row">
            <div class="col-md-12 ">
               <center> <label for="fetchbtn">&nbsp;</label>
                
               &nbsp; <input type="button" class="btn btn-success" ng-click="doFetchSelected();" value="Show Results">
               <br>
          </center>  </div>
        </div>&nbsp;
        <div class="container">
        <div class="row">
           

                <table class=" table table-bordered " id="tablee">

                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Category</th>
                        <th>Block</th>
                        <th>Resume</th>
                        <th>Delete</th>
                        
                       
                    </tr>

                    <tbody>
                        <tr ng-repeat="obj in jsonArraySelected">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{obj.uid}}</td>
                            <td>{{obj.mobile}}</td>
                            <td>{{obj.category}}</td>
                             <td><input value="block" class="btn btn-danger btn-sm" type="button" ng-click="doBlock(obj.uid);"></td>
                             <td><input value="resume" class="btn btn-danger btn-sm" type="button" ng-click="doUnblock(obj.uid);"></td>
                           
                            <td><input value="Delete" class="btn btn-danger btn-sm" type="button" ng-click="doDel(obj.uid);"></td>
                           
                        </tr>
                    </tbody>
                </table>
            
        </div>
    </div>
    </body>
</html>