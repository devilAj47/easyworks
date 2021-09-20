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
    <style>
        .stars-outer{
            display: inline-block;
            position: relative;
            font-family: FontAwesome;
            font-size:20px;
        }
        .stars-outer::before{
            content: "\f006 \f006 \f006 \f006 \f006";
            size:1rem;
        }
        .stars-inner{
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
            widows: 50%;
            font-size:20px;
        }
        .stars-inner::before{
           content:  "\f005 \f005 \f005 \f005 \f005";
           /* color: #f8ce6b;*/
            color: orange;
            size:1rem;
        }
        
        </style>
        <style>
            .deco{
                border: 1px solid black;
                
                background-color: #FBFBE4;
                margin-bottom: 10px;
                
              
            }
        
        </style>
     <script>
        var varModule = angular.module("ourmodule", []);
        varModule.controller("ourController", function($scope, $http) {


            $scope.jsonArray; //just declare
            $scope.jsonArrayCity;
            $scope.jsonArraySelected; //just declared

            $scope.doFetchCity = function() {

                $http.get("worker-search-city.php").then(okFx, notOkFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));//data contains jsonArray-shows jsonArray 
                    $scope.jsonArrayCity = response.data; //point, from local to global
                    $scope.selObjectCity = $scope.jsonArrayCity[2]; //point
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }
            }


            $scope.doFetchCat = function() {

                $http.get("worker-search-mobile-distinct.php").then(okFx, notOkFx);

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
                $http.get("worker-search-category.php?category=" + $scope.selObject.category + "&city=" + $scope.selObjectCity.city).then(okFx, notOkFx);

                function okFx(response) {
                    //alert(JSON.stringify(response.data));//data contains jsonArray-shows jsonArray 
                    $scope.jsonArraySelected = response.data;
                    alert($scope.jsonArraySelected);
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }
                /*if(okFx==false)
                    alert("available");
                else
                    alert("not available");*/


            }
            $scope.showDetails = function(index) {
                //alert($scope.jsonArray);

                // alert($scope.jsonArraySelected[index].name + "  " + $scope.jsonArraySelected[index].email);
                $scope.orgName = $scope.jsonArraySelected[index].orgName;
                $scope.adharname = $scope.jsonArraySelected[index].adharname;
                $scope.uid = $scope.jsonArraySelected[index].uid;
                $scope.email = $scope.jsonArraySelected[index].email;
                $scope.name = $scope.jsonArraySelected[index].name;
                $scope.mobile = $scope.jsonArraySelected[index].mobile;
                $scope.shop = $scope.jsonArraySelected[index].shop;
                $scope.city = $scope.jsonArraySelected[index].city;
                $scope.stat = $scope.jsonArraySelected[index].stat;
                $scope.address = $scope.jsonArraySelected[index].address;
                $scope.category = $scope.jsonArraySelected[index].category;
                $scope.special = $scope.jsonArraySelected[index].special;
                $scope.exp = $scope.jsonArraySelected[index].exp;
                $scope.other = $scope.jsonArraySelected[index].other;


            }




        });

    </script>
    <style>
        .wid{
            
            width: 220px;
            height: 40px;
        }
        .bc{
           /* background-color: #FC4445;
            background-color: #AFD275;*/
            background-color: #E85A4F;
            height: 60px;
            font-size: 34px;
            color: white;
        }
        .back{
             background-color:whitesmoke;
            height: 200px;
        }
        .foot{
            background-color: black;
        }
        .nv{
            color: white;
            
        }
        .nv:hover{
            color: black;
            text-decoration: underline;
        }
        </style>

</head>
    <body ng-app="ourmodule" ng-controller="ourController" ng-init="doFetchCat(); doFetchCity();">
    <nav class="navbar navbar-expand-sm navbar-dark bg-info ">
       <img src="pics/teamwork-union-people-logo-vector-1556054.jpg" width="40" height="40" class="d-inline-block align-top" alt=""style="border-radius:50%">&nbsp;
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
    <div class="row ">
        <div class="col-md-12 font-weight-bold ">
         
          
               <center> Search Pannel&nbsp;<i class="fa fa-search" ></i> : </center>
           
        </div><br>
        </div>
        </div>
      
        <div class="container back">
        <br>
        <div class="row">



            <div class="col-md-4 ">
              <center>  <label class=" h4 offset-1">Select City : </label>

                <select class="wid"ng-model="selObjectCity" class="custom-select" ng-options="obj.city for obj in jsonArrayCity"></select></center>


            </div>
            
            <div class="col-md-4 ">
               <center>
                <label class=" h4 offset-1">Select Category : </label>
                <select class="wid" ng-model="selObject" class="custom-select" ng-options="obj.category for obj in jsonArray">SELECT</select></center>

            </div>
       



            <div class="col-md-4 ">
               <center> <label for="fetchbtn">&nbsp;</label>
               <br> <input type="button" class="btn btn-dark" ng-click="doFetchSelected();" value="Show Results"><br>
          </center>  </div>
        </div>
        </div>
        <br><br>
    
<br>
    <div class="container ">
        <div class="row ">
            <div class="col-md-3" ng-repeat="obj in jsonArraySelected">
                <div class="card deco">
                    <img src="uploads/{{obj.orgName}}" height="150" class="card-img-top" alt="...">
                    <div class="card-body">
                        <P  class="card-title"><B>User id:</B> {{obj.uid}}</P>
                    <p class="card-text"><b>Name:</b> {{obj.name}}</p>
                        <p class="card-text"><b>Mobile:</b> {{obj.mobile}}</p>
                        
                    <p class="card-text"><b>Experience:</b> {{obj.exp}} years</p>
                  <!--  <p class="card-text"><b>Experience:</b> {{obj.exp}} years</p>-->
                      <div class="stars-outer" ng-show="{{obj.count}}">
                          <div class="stars-inner" style="width:{{obj.total/obj.count*20}}%"></div>
                      </div>
                       
                        <div data-toggle="modal" data-target="#modaldetails" ng-click="showDetails($index);" class="btn btn-success font-weight-bold ">More Details</div>
                    </div>
                </div>
            </div><br>
        </div>
    </div>
  <!-- <div class="container foot">
       <div class="row">
           @copyright
       </div>
   </div>-->
		<!----------------------modal---------------------------------------------------->
	<div class="modal fade" tabindex="-1" role="dialog" id="modaldetails">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title ">Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container-fluid" >
                   <!--<img src="uploads/{{obj.orgName}}" height="100" width="100"><br>
                   1<!-- Name: {{obj.name}}<br> <input type="text" ng-model="name" readonly>
                    Mobile: {{obj.mobile}}<br>
                    State: {{obj.stat}}<br>
                    City: {{obj.city}}<br>
                    Address: {{obj.address}}<br>
                    Shop: {{obj.shop}}<br>
                   other: {{obj.other}}<br>
                    Adhar card:<img src="uploads/{{obj.adharname}}" height="100" width="100"><br>-->
                    
                     <div class="container">
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <center> <img src="uploads/{{orgName}}" alt="profile-pic" height="150px"></center>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <label>User id</label>
                                <input type="text" ng-model="uid" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                 <label>Name</label>
                                <input type="text" ng-model="name" readonly>
                            </div>
                         </div>
                             <div class="form-row">
                              <div class="col-md-6 form-group">
                               <label>Email</label>
                                <input type="text" ng-model="email" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile</label>
                                <input type="text" ng-model="mobile" readonly>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input type="text" ng-model="stat" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                 <label>City</label>
                                <input type="text" ng-model="city" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label> Experience</label>
                                <input type="text" ng-model="exp" readonly>
                            </div>
                             <div class="col-md-6 form-group">
                                 <label> specialization</label>
                                <input type="text" ng-model="special" readonly>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label> Firm/Shop</label>
                                <input type="text" ng-model="shop" readonly>
                            </div>
                            <div class="col-md-6 form-group">
                                <label> Other Info</label>
                                <input type="text" ng-model="other" readonly>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-6 form-group ">
                               <label>Address</label>
                               
                                <input type="text" ng-model="address" readonly>
                            </div>
                        </div>
                         <div class="form-row">
                            <div class="col-md-12 form-group">
                                <center> <img src="uploads/{{adharname}}" alt="profile-pic" height="150px"></center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   <!-- <input type="button" value="Interested" class="btn-primary font-italic">-->

                


                </div>
            </div>
        </div>
    </div>

</body>
</html>