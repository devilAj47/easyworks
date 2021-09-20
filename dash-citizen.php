<?php
    session_start();
    if(isset($_SESSION["user"])!=true)
    {
        header("location:index.php");
    }
    ?>
    <html>
<head>
    <title>
        dash board
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
    <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f172bfda45e787d128bde33/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
    <style>
        .dr{
            color: white;
        }
        .bv{
            background-color: black;
          
        }
        .b{
            color: white;
        }

        .card2 {
            width: 90%;
            height: 328px;
            background-color:floralwhite;
            margin-top: 10px;
           /* box-shadow: 7px 5px 10px 5px gray;*/
            box-shadow: 0 0 25px gray;
            background-color: #FFEBCD;
        }

        .card2:hover {}

        .cardimage {
            border-radius: 50%;
            color: black;
            width: 130px;
            height: 130px;
            margin-top: 10px;
        }
        .cardimages {
            border-radius: 50%;
         
            width: 130px;
            height: 130px;
            margin-top: 10px;
        }

        /*  body{
             background-color: lightgoldenrodyellow;
        }*/
        .nv{
            color: white;
            
        }
        .nv:hover{
            color: black;
            text-decoration: underline;
        }

        .layer {
            padding: 10px;
            width: 90%;
            height: 368px;
            /*background-color: bisque;
            background-color: oldlace;
            border: 2px solid black;*/

        }

   
        .fontuser {
            position: relative;

        }

        .fontuser i {
            position: absolute;
            left: 5px;
            top: 44px;
            color: black;
            /* background-color: gainsboro;*/
        }

        .id {

            padding-left: 28px;
        }
        .comb{
            width: 200px;
            height: 38px;
        }
       
    </style>
    <script>
         $(document).ready(function() {
         $("#change").click(function() {
                 //alert("hello"); 
                var uid = $("#txtUid").val();
                var pass = $("#txtpass").val();
                //alert(uid);
             // alert(pass);
               
                var actionUrl = "change-process.php?uid=" + uid + "&pass=" +pass;
                //alert(actionUrl);
                  $.get(actionUrl, function(response) {
                    $("#loginmsg").html(response);
                     

                });
               

            });
         });
    </script>
    <!------------------------------------------------------------------------------------------------------>
    <script>
    $(document).ready(function() {
        //alert();
     $("#post").click(function() {
            // alert("hello"); 
            var uid = $("#txtuid").val();
            var category = $("#txtcategory").val();
            var fault = $("#txtfault").val();
            var location = $("#txtloc").val();
            var city = $("#txtcity").val();
          
             
            var actionUrl = "dash-citizen-require-process.php?uid=" + uid + "&category=" + category + "&fault=" +
                fault + "&location=" + location + "&city=" + city;
            
           //alert(actionUrl);
         if(uid==""|| city==""||location==""||fault==""||category=="")
             { $("#postmsg").html("Fill your empty fields!").css("font-weight","bold").css("font-size","20px");
                 
             }
           else {
               $.get(actionUrl, function(response) {
                $("#postmsg").html(response).css("font-weight","bold").css("font-size","20px");


            });
                }

        });    
        
    });
    
    </script>
    <script>
     $(".postnew").click(function(){
          
        $("#postif").trigger("reset");
        $("#postmsg").html("");
       
        });
    
    </script>
     <script>
            var module=angular.module("ourmodule",[]);
            module.controller("ourcontroller",function($scope,$http){
                $scope.jsonArray;
                $scope.jsonArraySel;
                $scope.uid;
                $scope.rid;
                $scope.r;
                $scope.doFetch=function()
                {
                    //alert($scope.uid);
                    $http.get("worker-search-manager.php?uid="+$scope.uid).then(okFx,notOkFx);
                    alert($scope.uid);
                    function okFx(response)
                    {
                        alert(JSON.stringify(response.data));
                        $scope.jsonArray=response.data;
                        $("#req").css("display","block");
                       // $scope.selObject = $scope.jsonArray[1];
                        alert($scope.jsonArray);
                    }
                    function notOkFx(response)
                    {
                        alert(response.data);
                    }
                }
                //====================delete===================================================
                $scope.doDel=function(i)
                {
                    $scope.r=$scope.jsonArray[i].rid;
                    $http.get("json-delete.php?rid="+$scope.r).then(okFx,notOkFx);
                    function okFx(response)
                    {
                       // alert(JSON.stringify(response.data));
                       // $scope.jsonArraySel=response.data;
                       // $scope.selObject = $scope.jsonArray[1];
                        $scope.doFetch();
                        
                    }
                    function notOkFx(response)
                    {
                        alert(response.data);
                    }
                }
                
            });
        </script>
        <style>
     .kite{
           /* background-color: lightslategrey;*/
           
         /* background-color: #FF9966;*/
           background-color: #E85A4F;
           
            height: 50px;
            font-style:oblique ;
            font-size: 30px;
            color: whitesmoke;
            
            
        }
    </style>
    
</head>

<body  ng-app="ourmodule" ng-controller="ourcontroller">

    <!--nav bar------------------------------------------------------------------------->
    <nav class="navbar navbar-expand-sm navbar-dark bg-info ">
       <img src="pics/teamwork-union-people-logo-vector-1556054.jpg" width="40" height="40" class="d-inline-block align-top" alt=""style="border-radius:50%">&nbsp;
        <a href="#" class="navbar-brand">&nbsp;Manpower</a>
         <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
         <div class="collapse navbar-collapse" id="navbarmenu">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item "><a href="index.php" class="nav-link"><div class="nv"><i class="fa fa-home" ></i>&nbsp;<b>Home</b></div></a></li>
               <li class="nav-item txt"><a href="logout.php" class="nav-link"><div class="nv"><i class="fa fa-sign-out"></i>&nbsp;<b>Logout</b></div></a></li>
             </ul></div>
      
        

    </nav>
    <!--nav bar--------------over----------------------------------------------------------->
<br>
    <div class="container">
    <div class="row">
        <div class="col-md-12 kite">
            <center><b><?php 
echo $_SESSION["user"];
    
    
    ?> Dashboard&nbsp;<i class="fa fa-tachometer" ></i></b></center>
        </div>
    </div></div>
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-4">
               
                    <div class="layer">
                    <center>
                     <div class="card card2">
                            <center><img src="pics/updatee.png" class="cardimages" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Profile Update</b></h5>
                                <p class="card-text">update your profile here</p>
                                <center><a href="profile-citizen-front.php"class="btn btn-success length " >Update</a></center>
                            </div>
                        </div>
                        </center></div>
                
            </div>
            <div class="col-md-4">
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/undraw_publish_post_vowb.png" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Post Work</b></h5>
                                <p class="card-text">post your work requirement</p>
                                <center><a href="#" class="btn btn-success length " data-toggle="modal" data-target="#modalSignup">Post work</a></center>
                            </div>
                        </div>
                    </center>
                </div>

            </div>
             <div class="col-md-4">
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/undraw_Note_list_re_r4u9.png" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Requirement Manager</b></h5>
                                <p class="card-text">Delete your posted work</p>
                                <center><a href="#" class="btn btn-success length " data-toggle="modal" data-target="#manage"  >Manage</a></center>
                            </div>
                        </div>
                    </center>
                </div>

            </div>



        </div>
          <div class="row mt-5">

            <div class="col-md-4">
              
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/download%20(2).jpg" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Check Ratings</b></h5>
                                <p class="card-text">rating request from worker.</p>
                                <center><a href="rate-front.php" class="btn btn-success length "  >Manage</a></center>
                            </div>
                        </div>
                    </center>
                </div>
              
        </div>
         <div class="col-md-4">
              
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/key.jpg" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Change Password </b></h5>
                                <p class="card-text">Change your password here </p>
                                <center><a href="logout.php" class="btn btn-success length " data-toggle="modal" data-target="#changemodal" >Change</a></center>
                            </div>
                        </div>
                    </center>
                </div>
              
        </div>
        
            <div class="col-md-4">
              
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/images%20(5).jpg" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Search Worker </b></h5>
                                <p class="card-text">Search workers on basis of city </p>
                                <center><a href="worker-search.php" class="btn btn-success length "  >Search</a></center>
                            </div>
                        </div>
                    </center>
                </div>
              
        </div>

    </div>
    </div>
    <br>
    <div class="container bv">
        <div class="row b">
       <marquee>&copy;Made by Manpower.com </marquee>  
        </div>
    </div>
    <br>
    <!--------------------modal post--------------------------------------------------------------------->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalSignup">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title ">Work requirement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="dash-citizen-require-process.php" method="post" id="postif">
                        <div class="form-row">
                            <div class=" col-md-6 form-group ">
                                <div class="fontuser">
                                    <label for="txtUid">User id</label>
                                    <input type="text" class="form-control id" id="txtuid" name="uid" placeholder="enter your valid uid"value='<?php  echo $_SESSION["user"];?>'>
                                    <i class="fa fa-user fa-lg"></i>
                                </div> 

                                <!------------------------------------------------>
                            </div>


                            <div class="col-md-6 form-group">

                                <label for="">Category</label><br>
                                <select name="category" id="txtcategory" class="comb">
                                    <option Selected>choose below</option>
                                    <option value="plumber">plumber</option>
                                    <option value="carpenter">carpenter</option>
                                    <option value="painter">painter</option>
                                    <option value="mason">mason</option>
                                    <option value="Ac">Ac repair</option>
                                    <option value="electrician">electrician</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class=" col-md-12 form-group ">
                                <label for="">Fault</label>
                                <input type="text" class="form-control id" id="txtfault" name="fault" placeholder="write your problem here">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class=" col-md-6 form-group ">
                                <label for="">Location</label>
                                <input type="text" class="form-control id" id="txtloc" name="location" placeholder="location of task">
                            </div>
                             <div class=" col-md-6 form-group ">
                                <label for="">City</label>
                                <input type="text" class="form-control id" id="txtcity" name="city" >
                            </div>
                        </div>

                        <div class="form-group">
                            <!--  <span id="successmsg" class="text-success"></span>-->
                            <center> <span id="postmsg" name="postmsg"></span><br><br></center>
                            <center> <input type="button" value="post Work" name="btn" class="btn btn-success postnew" id="post"  style="width:100px"></center>

                          


                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>


    <!--------------------modal post--------------------------------------------------------------------->
    <!--------------------modal manage--------------------------------------------------------------------->
    <div class="modal fade" id="manage" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog"><!--modal-dialog-centered-->
    <div class="modal-content modal-xl">
      <div class="modal-header bg-warning">
          <h5 class="modal-title" id="staticBackdropLabel"><b>Requirement Manager</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container">
      <div class="form-row">
              <div class=" col-md-6 form-group">
                 <input type="text" class="form-control" placeholder="Enter ID" ng-model="uid" name="uid" ng-init="uid='<?php  echo $_SESSION["user"];?>'">
          </div>
     <br>
     
              <div class=" col-md-6 form-group">
                <button class="btn btn-secondary" ng-click="doFetch();">Fetch requests</button>
          </div></div>
         
          
      
<table class="  table-container " style="display:none;" id="req">
  
    <tr class="bg-dark dr" >
      <th >Index&nbsp;</th>
      <th >&nbsp;Woker</th>
      <th >&nbsp;Category</th>
      
      <th >&nbsp;Fault</th>
      
      <th >&nbsp;Delete</th>
    </tr>
  
  
    <tr ng-repeat="obj in jsonArray">
      <th scope="row">{{$index+1}}&nbsp;</th>
      <td>{{obj.uid}}&nbsp;</td>
      <td>{{obj.category}}&nbsp;</td>
      <td>{{obj.fault}}&nbsp;</td>
      
      <td><input value="Delete" class="btn btn-danger btn-sm" type="button" ng-click="doDel($index);"></td>&nbsp;
    </tr>

</table>
</div>  
          
          
      </div>
     
    </div>
  </div>
</div> 

    <!--------------------modal manage--------------------------------------------------------------------->
    <!--------------------change pass--------------------------------------------------------------------->
     <div class="modal fade" id="changemodal"tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div id="wait"></div>
                    <form action="index-login.php" method="post" id="loginf">
                        <div class="form-group">
                            <label for="txtUid">user id</label>
                            <input type="text" class="form-control " id="txtUid" name="uid"value='<?php  echo $_SESSION["user"];?>'>
                           
                            <span id="erruid"></span>
                            

                            <!------------------------------------------------>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control"  name="pass"
                            id="txtpass">
                          <span id="errpassword"></span>
                           
                        </div>
                       
                        <div class="form-group">
                          <!--  <span id="successmsg" class="text-success"></span>-->
                         
                           <span id="loginmsg" name="loginmsg"></span>
                            <center> <input type="button" value="change" name="change" class="btn btn-dark" id="change" style="width:100px"></center>
                            
                             
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------------------change pass--------------------------------------------------------------------->


</body>

</html>
