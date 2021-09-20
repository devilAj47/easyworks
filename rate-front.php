<html>
   <?php
    session_start();
    ?>
    <head>
         <title>
  rate worker
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="jq/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="jq/angular.min.js"></script>
    <!--********************style************************************-->
    <style>
        .lkk{
            
          padding: 30px;
            
        }
        .tb{
            background-color: #FF165D;
        }
        .tc{
            background-color: lightgoldenrodyellow;
         
           
           
        }
        body{
            background-color: #F9FAF5;
        }
        .stl{
            color: white;
        }
        .hide {
            display: none;
        }

        label {
            font-size: 2rem;
        }

        .rating {
            direction: rtl;
        }

        .rating>label:hover::before,
        .rating>label:hover~label:before,
        .rating>input:checked~label:before {
            color: gold;
            content: "\2605";
            position: absolute;
        }

        .rating>label:hover::before,
        .rating>label:hover~label:before {
            background-color: ;
        }
        .lk{
            width: 220px;
            height: 40px;
        }
        .cont{
             background-color: lightgray;
            height: 200px;
        }
        .vb{
            margin-top: 60px;
        }
        </style>
    <script>
         var module=angular.module("ourmodule",[]);
            module.controller("ourcontroller",function($scope,$http){
                // $scope.jsonArraySelected;
                 $scope.doFetchSelected = function() {
                
                $http.get("rate-select.php?citizenid=" + $scope.citizenid ).then(okFx, notOkFx);

                function okFx(response) {
                   // alert(JSON.stringify(response.data));
                    $scope.jsonArraySelected = response.data;
                    //alert($scope.jsonArraySelected);
                }

                function notOkFx(response) {
                    alert(response.data); //shows error
                }
               


            }
                  $scope.updateRatings = function(rid, workerUsername, index) {
                console.log(rid);

                var ele = document.getElementsByName(rid);
                for (i = 0; i < ele.length; i++) {
                    if (ele[i].checked) {
                        $scope.ratingsValue = ele[i].value;
                        $http.get("rate-process.php?uid=" + workerUsername + "&total=" + $scope.ratingsValue + "&rid=" + rid).then(ok, notok);

                        function ok(response) {
                            if (response.data == "ok") {
                               alert("Done Sucessfully! THANKS FOR RATING.");
                                $scope.jsonArraySelected.splice(index, 1);
                            }
                        }
                          function notok(response) {
                    alert(response.data); //shows error
                }
                    }
                }

            }


                
                
            });
        
        </script>
    </head>
    <body ng-app="ourmodule" ng-controller="ourcontroller" >
       
    <!--nav bar------------------------------------------------------------------------->
    <nav class="navbar navbar-expand-sm navbar-dark bg-info ">
       <img src="pics/teamwork-union-people-logo-vector-1556054.jpg" width="40" height="40" class="d-inline-block align-top" alt="" style="border-radius:50%">&nbsp;
        <a href="#" class="navbar-brand">&nbsp;Manpower</a>
        </nav>
        <br>
        <center><h1><b>Rate The Worker</b></h1></center>
        <center> <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="pics/hjjjj(1).gif" class="  image-responsive" height="200px" alt="...">
    </div>
   
  </div>
</div>
    </center><br><br>
    
       
        <div class="container  "><br><br>
     <center>  <div class="form-row ">
           
            <div class="col-md-8 form-group">
               
             <label class=" "><b>Enter UserId :</b> </label>
                <input type="text" ng-model="citizenid" ng-init="citizenid='<?php  echo $_SESSION["user"];?>'" placeholder="Enter your user id" class="lk">   
              

            </div>
             
              <div class="col-md-4 form-group  ">
               
                
                 <label class=" "><b>&nbsp;</b> </label>
                <input type="button" class="btn btn-success " ng-click="doFetchSelected();" value="Show Results">
                 </div>
         </div></center>



        </div>
       
<br>
    
    <!--nav bar--------------over----------------------------------------------------------->
          <div class="container">
        <div class="row">
           

                <table class=" table table-bordered  " id="tablee">

                    <tr class="bg-dark stl">
                        <th>S.no</th>
                        <th>Name</th>
                         <th>Rate It</th>
                <th>Post Ratings</th>
                       
                      
                        
                       
                    </tr>

                    <tbody class="tc">
                        <tr ng-repeat="obj in jsonArraySelected">
                            <th scope="row">{{$index+1}}</th>
                            <td>{{obj.workerid}}</td>
                           <!-- <td><a href="rate.php"><input type="button" value="Rate" class="btn btn-success "></a></td>-->
                             <td>
                    <form>
                       <div class="container">
                       <div class="row">
                       <div class="col-md-10">
                        <div class="rating">
                            <input type="radio" name={{obj.rid}} class="hide" id="star5-{{obj.rid}}" value="5"><label for="star5-{{obj.rid}}">&#9734;</label>
                            <input type="radio" name={{obj.rid}} class="hide" id="star4-{{obj.rid}}" value="4"><label for="star4-{{obj.rid}}">&#9734;</label>
                            <input type="radio" name={{obj.rid}} class="hide" id="star3-{{obj.rid}}" value="3"><label for="star3-{{obj.rid}}">&#9734;</label>
                            <input type="radio" name={{obj.rid}} class="hide" id="star2-{{obj.rid}}" value="2"><label for="star2-{{obj.rid}}">&#9734;</label>
                            <input type="radio" name={{obj.rid}} class="hide" id="star1-{{obj.rid}}" value="1"><label for="star1-{{obj.rid}}">&#9734;</label>
                        </div>
                           </div> </div></div>
                    </form>
                </td>
                <td>
                    <input type="button" value="Post Rating" class="btn btn-dark " ng-click="updateRatings(obj.rid,obj.workerid,$index);">
                    

                </td>

                           
                            
                           
                        </tr>
                    </tbody>
                </table>
            
        </div>
    </div>
        
    </body>
</html>