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
        dash board worker
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="jq/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
         .bv{
            background-color: black;
          
        }
        .b{
            color: white;
        }
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
    <style>
 

        .card2 {
            width: 90%;
            height: 328px;
         
            margin-top: 10px;
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
          border-color: aliceblue;
            width: 130px;
            height: 130px;
            margin-top: 10px;
        }

        /*  body{
             background-color: lightgoldenrodyellow;
        }*/
        .length {
            align-content: center;
            width: 150px;
        }

        .layer {
            padding: 10px;
            width: 90%;
            height: 368px;
         /*   background-color: lightgray;*/

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
        .postnew{
            width: 120px !important;
        }
         .nv{
            color: white;
            
        }
        .nv:hover{
            color: black;
            text-decoration: underline;
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
       // alert();
     $("#post").click(function() {
            // alert("hello"); 
            var citizenid = $("#txtuid").val();
            var workerid = $("#txtwuid").val();
          
          
             
            var actionUrl = "dash-worker-require-process.php?citizenid=" + citizenid + "&workerid=" + workerid ;
            
           //alert(actionUrl);
         
               $.get(actionUrl, function(response) {
                $("#ratemsg").html(response).css("font-weight","bold").css("font-size","20px");


            });
                

        });    
        
    });
    
    </script>
    <!--<script>
     $(".postnew").click(function(){
          
        $("#postif").trigger("reset");
        $("#postmsg").html("");
       
        });
    
    </script>-->
</head>

<body>

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
    <br>
    <div class="container">
    <div class="row">
        <div class="col-md-12 kite">
            <center><b><?php 
echo $_SESSION["user"];
    
    
    ?> Dashboard&nbsp;<i class="fa fa-tachometer" ></i></b></center>
        </div>
    </div></div>
    <!--nav bar--------------over----------------------------------------------------------->
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
                                <center><a href="profile-worker-front.php"class="btn btn-success " >Update</a></center>
                            </div>
                        </div>
                        </center></div>
                
            </div>
            <div class="col-md-4">
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/download%20(2).jpg" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Request Rating</b></h5>
                                <p class="card-text">Request client to rate work</p>
                                <center><a href="#" class="btn btn-success  " data-toggle="modal" data-target="#modalratting">Request</a></center>
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
                                <p class="card-text">Set your new password </p>
                                <center><a href="logout.php" class="btn btn-success  " data-toggle="modal" data-target="#changemodal" >Change</a></center>
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
                            <center><img src="pics/undraw_hire_te5y.png" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Search</b></h5>
                                <p class="card-text">Check available work in your city </p>
                                <center><a href="citizen-search-by-worker.php" class="btn btn-success  "  >Search</a></center>
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
    <div class="modal fade" tabindex="-1" role="dialog" id="modalratting">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning ">
                    <h5 class="modal-title">Request Rating</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="dash-worker-require-process.php" method="post" id="postif">
                        <div class="form-row">
                            <div class=" col-md-12 form-group ">
                                <div class="fontuser">
                                    <label for="txtUid">Citizen id</label>
                                    <input type="text" class="form-control id" id="txtuid" name="uid" placeholder="enter your valid uid">
                                    <i class="fa fa-user fa-lg"></i>
                                </div> 
                            </div>


                           

                        </div>
                          <div class="form-row">
                            <div class=" col-md-12 form-group ">
                                <div class="fontuser">
                                    <label for="txtUid">Worker id</label>
                                    <input type="text" class="form-control id" id="txtwuid" name="wuid" placeholder="enter your valid uid">
                                    <i class="fa fa-user fa-lg"></i>
                                </div> 

                               
                            </div>


                           

                        </div>

                      

                      

                        <div class="form-group">
                            <!--  <span id="successmsg" class="text-success"></span>-->
                            <center> <span id="ratemsg" name="ratemsg"></span><br><br></center>
                            <center> <input type="button" value="Send Request" name="btn" class="btn btn-secondary postnew" id="post"  style="width:100px"></center>

                          


                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>


    <!--------------------modal post---------------------------------------------------------------------><!--------------------change pass--------------------------------------------------------------------->
     <div class="modal fade" id="changemodal"tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div id="wait"></div>
                    <form action="index-login.php" method="post" id="loginf">
                        <div class="form-group">
                            <label for="txtUid">user id</label>
                            <input type="text" class="form-control" id="txtUid" name="uid">
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
                         
                           <span id="loginmsg" name="loginmsg"></span><br>
                            <center> <input type="button" value="change" name="change" class="btn btn-danger" id="change" style="width:100px"></center>
                            
                             
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------------------change pass--------------------------------------------------------------------->



</body>

</html>
