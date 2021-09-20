<html>

<head>
    <title>
        search worker
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
 //$(tablee).css("display","none");

            $scope.jsonArray; //just declared
            $scope.jsonArrayCity;
            $scope.jsonArraySelected; //just declared
            $scope.ArraySelected; //just declared

            $scope.doFetchCity = function() {

                $http.get("citizen-search-city.php").then(okFx, notOkFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));//data contains jsonArray-shows jsonArray 
                    $scope.jsonArrayCity = response.data; //point, from local to global
                    $scope.selObjectCity = $scope.jsonArrayCity[2];
                    //point
                    //$(tablee).css("display","block");
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }
            }


            $scope.doFetchCat = function() {

                $http.get("citizen-category.php").then(okFx, notOkFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));//data contains jsonArray-shows jsonArray 
                    $scope.jsonArray = response.data; //point, from local to global
                    $scope.selObject = $scope.jsonArray[0]; //point
                    
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }
            }








            //=-=-=-=-=-=-=-=-=
            //works on button click
            $scope.doFetchSelected = function() {
                //alert($scope.selObject.mobile);
                $http.get("citizen-search-card.php?category=" + $scope.selObject.category + "&city=" + $scope.selObjectCity.city).then(okFx, notOkFx);

                function okFx(response) {
                    alert(JSON.stringify(response.data));//data contains jsonArray-shows jsonArray 
                    $scope.jsonArraySelected = response.data;
                    alert($scope.jsonArraySelected);
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }



            }
            $scope.showDetails = function(uid, index) {
                //alert($scope.jsonArray);

                // alert($scope.jsonArraySelected[index].name + "  " + $scope.jsonArraySelected[index].email);
                $http.get("citizen-search-fetch.php?uid=" + uid).then(okFx, notOkFx);
                alert(uid);

                function okFx(response) {
                    alert(JSON.stringify(response.data)); //data contains jsonArray-shows jsonArray 
                    $scope.ArraySelected = response.data;
                    alert($scope.ArraySelected);
                    $scope.uid = $scope.ArraySelected[index].uid;
                    $scope.name = $scope.ArraySelected[index].name;
                    $scope.mobile = $scope.ArraySelected[index].mobile;
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }



            }




        });

    </script>
   
    <style>
         .stl{
            color: white;
        }
         .back{
             background-color:whitesmoke;
            height: 200px;
        }
        .wid {

            width: 220px;
             height: 40px;
        }
        .nv{
            color: white;
            
        }
        .nv:hover{
            color: black;
            text-decoration: underline;
        }
        .bc{
           /* background-color: #FC4445;
            background-color: #AFD275;*/
            background-color: #E85A4F;
            height: 60px;
            font-size: 34px;
            color: white;
        }

    </style>

</head>

<body ng-app="ourmodule" ng-controller="ourController" ng-init="doFetchCat(); doFetchCity();">
<nav class="navbar navbar-expand-sm navbar-dark bg-info ">
       <img src="pics/teamwork-union-people-logo-vector-1556054.jpg" width="40" height="40" class="d-inline-block align-top" alt="" style="border-radius:50%">
        <a href="#" class="navbar-brand">&nbsp;Manpower</a>
         <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
         <div class="collapse navbar-collapse" id="navbarmenu">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item "><a href="index.php" class="nav-link"><div class="nv"><i class="fa fa-home" ></i>&nbsp;<b>Home</b></div></a></li>
               
             </ul></div>
      
        

    </nav>
        <br>
 <div class="container bc">
        
    <div class="row">
        <div class="col-md-12 font-weight-bold  ">

           
                
                    <center> <h1>Search Pannel &nbsp;<i class="fa fa-search" ></i> :</h1> </center>
              
              
           
        </div><br>
    </div>
    </div>
    <div class="container back">
       <br>
        <div class="row">



            <div class="col-md-4 ">
                <center> <label class=" h4 offset-1">Select City : </label>

                    <select class="wid" ng-model="selObjectCity" ng-options="obj.city for obj in jsonArrayCity"></select></center>


            </div>
       
            <div class="col-md-4 ">
                <center>
                    <label class=" h4 offset-1">Select Category : </label>
                    <select class="wid" ng-model="selObject" ng-options="obj.category for obj in jsonArray">SELECT</select></center>

            </div>
        
            <div class="col-md-4 ">
                <center> <label for="fetchbtn">&nbsp;</label>
                    <br>
                    <input type="button" id="delete"class="btn btn-secondary" ng-click="doFetchSelected();" value="Show Results">
                </center>
            </div>
        </div>
    </div>
    <br>

<br>

    <div class="container" style="overflow-x:auto;">
       
            
                <table class=" table table-bordered " id="tablee">

                    <tr class="bg-dark stl">
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Category</th>

                        <th>Fault</th>
                        <th>City</th>

                        <th>Details</th>
                    </tr>

                    <tbody>
                        <tr ng-repeat="obj in jsonArraySelected">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{obj.uid}}</td>
                            <td>{{obj.category}}</td>
                             <td>{{obj.fault}}</td>
                            <td>{{obj.city}}</td>
                           

                            <td>
                                <div data-toggle="modal" data-target="#contactdetails" ng-click="showDetails(obj.uid,$index);" class="btn btn-info font-weight-bold ">Contact Details</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
           
        </div>
   

    <!----------------------modal---------------------------------------------------->
    <div class="modal fade" tabindex="-1" role="dialog" id="contactdetails">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title ">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container-fluid" ><!--ng-repeat="obj in ArraySelected"-->

                    <div class="container">

                        <div class="row">
                            <!--  User id: {{obj.uid}}<br> 
                            Name: {{obj.name}}<br> 
                    Mobile: {{obj.mobile}}<br>-->
                            <table class="table table-border">
                                <tr>
                                    <th>User id</th>
                                    <td>{{ArraySelected[0].uid}}</td>




                                </tr>
                                <tr>
                                    
                                    <th>Name</th>
                                    <td>{{ArraySelected[0].name}}</td>

                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>{{ArraySelected[0].mobile}}</td>
                                </tr>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!----------------------modal---------------------------------------------------->

</body>

</html>
