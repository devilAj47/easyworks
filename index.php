<html>
    <head>
    <title>
        manpower
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="jq/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--********************style************************************-->
    <style>
        .nv i{
            color: black !important;
        }
        .footer{
    margin-top: 50px;
    background-color:black;
            opacity: 0.8;
    color: #fff;
}
.footer h1{
    font-size: 15px;
    margin: 25px 0;
    
}
.footer p{
    font-size: 12px;
    
}
.copyright{
    margin-bottom: -80px;
    text-align: center;
    font-size: 15px;
    padding-bottom: 20px;
}
.footer hr{
    margin-top: 10px;
    background-color: #ccc;
}
.footer img{
    width: 150px;
}
.footer .row .fa{
    padding-right: 20px;
    font-size: 15px;
}
        </style>
   <style>
 

        .card2 {
            width: 90%;
            height: 328px;
            background-color:floralwhite;
            margin-top: 10px;
            box-shadow: 5px 10px 10px black;
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
        .length {
            align-content: center;
            width: 150px;
        }

        .layer {
            padding: 10px;
            width: 90%;
            height: 368px;
           /* background-color: bisque;
            background-color: #F5DEB3;
            background-color: #F3D5B1;
            background-color: #FFCF75;*/
            background-color: #FF9966;
           
           /* border: 2px solid black;*/

        }
        </style>
    <style>
        
         .fontuser { 
            position: relative; 
       
        } 
          
        .fontuser i{ 
            position: absolute; 
            left: 5px; 
            top: 44px; 
            color: black;
           /* background-color: gainsboro;*/
        } 
    .id{
        
       padding-left: 28px;
    }
        .fontusers { 
            position: relative; 
       
        } 
        .fontusers i{ 
            position: absolute; 
            left: 5px; 
            top: 38px; 
            color: black;
           font-size: 26px;
           /* background-color: gainsboro;*/
        } 
	.website-features{
    margin:60px 0;
    
}
.website-features img{
    width: 20%;
}
.feature-text{
    margin-top: 10px;
    float: right;
    width: 80%;
    padding-left: 20px;
}
.feature-box{
    padding-top: 20px;
}
        .line{
            font-style: oblique;
            color: white;
           
        }
        .lines{
            height: 70px;
            width: 300px;
            background-color:green;
             padding: 10px;
        }
        .kite{
           /* background-color: lightslategrey;*/
             background-color:dimgray;
            opacity: .8;
           
            height: 50px;
            font-style:oblique ;
            font-size: 30px;
            color: whitesmoke;
            
            
        }
       
        .title-box{
    background: orange;
    color: #fff;
    width: 250px;
    padding: 4px 8px;
    height: 40px;
    margin-bottom: 50px;
    display: flex;
}
.title-box h2{
    font-size: 24px;
    
}
        .tbl{
            border: 4px solid blue;
            
        }
        .tdl{
            padding: 10px;
        }
        .nv{
            /*font-size:  24px !important;*/
            color: black!important;
           
        }
        .nv:hover{
            color: white !important;
            text-decoration: underline;
        }
        </style>
        <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->
</head>

<script>
    $(document).ready(function() {

        //alert();
        $("#txtUid").blur(function() {


            var uid = $("#txtUid").val();
            // alert(uid);
            var actionUrl = "submit-ajax.php?uid=" + uid;
            $.get(actionUrl, function(response) {
                $("#errUid").html(response).css("color", "red");


            });
        });
        //checking uid available or not--------------------------------------


        $("#submit").click(function() {
            // alert("hello"); 
            var uid = $("#txtUid").val();
            var pass = $("#txtPass").val();
            var mobile = $("#txtMob").val();
           
            var category =
$("input[name='option']:checked").val();
           
            





            // alert(category);
            var actionUrl = "submit-process.php?uid=" + uid + "&pass=" + pass + "&mobile=" + mobile + "&category=" + category ;
            //+ "&status=" + status;
           // alert(actionUrl);
            $.get(actionUrl, function(response) {
               // $("#successmsg").html(response);
alert(response);

            });

var acturl="smssend.php?uid="+uid+"&pass="+ pass + "&mobile=" + mobile + "&category=" + category ;
            $.get(acturl, function(respo) {
              alert(respo);


            });


        });
        //---------------------------------------------------submit--------------------------
        $("#txtMob").blur(function() {
            var r = /^[6-9]{1}[0-9]{9}$/;
            var pwd = $("#txtMob").val(); 

            if (r.test(pwd) == false) {
                $("#errmob").html("Invalid Mobile number").css("color", "red");
            } else {
                $("#errmob").html("Valid").css("color", "green");

            }

        });
        //---------------------------------mobile validation--------------------------
         $("#txtPass").blur(function() {
          /*  var re = /^[A-Za-z]\w{7,10}$/;*/
            var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,9}$/;
            var pwde = $("#txtPass").val(); 

            if (re.test(pwde) == false) {
                $("#errpass").html("minimum 6 max 8,no special char,include at least one upper case letter,one lower case letter,one numeric digit.").css("color", "red");
            } else {
                $("#errpass").html("Valid").css("color", "green");

            }

        });
         //----------------------------------------------------login -------
            $("#login").click(function() {
                 //alert("hello"); 
                var uid = $("#txtuid").val();
                var pass = $("#txtpass").val();
                //alert(uid);
             // alert(pass);
               
                var actionUrl = "login-process.php?uid=" + uid + "&pass=" +pass;
                //alert(actionUrl);
                  $.get(actionUrl, function(response) {
                    //$("#loginmsg").html(response);
                      if(response=="worker"){
                          //$("#loginmsg").html(response);
                          alert(uid);
                          location.href="dash-worker.php";
                      }else
                          if(response=="citizen"){
                          //$("#loginmsg").html(response);
                          location.href="dash-citizen.php";
                      }
                      else{
                          $("#loginmsg").html(response);
                      }


                });
               

            });
            
            //----------------------------------------------------login over
        $("#loginnew").click(function(){
          
        $("#loginf").trigger("reset");
        $("#loginmsg").html("");
        });
         $("#submitnew").click(function(){
          
        $("#submitf").trigger("reset");
             $("#errUid").html("");
             $("#errmob").html("");
             $("#errpass").html("");
        $("#successmsg").html("");
        });
        
        $("#forget").click(function(){
                    var uid=$("#txtuid").val();
                 
                    var actionurl="sms-send.php?uid="+uid;
                    //alert(idl);
                    $.get(actionurl,function(response){
                        if(response=="Message sent to your mobile number.")
                           // $("#loginres").html(response).removeClass("showw1").addClass("showw");
                            alert("Your password has been sent to your mobile");
                        else
                            //$("#loginres").html(response).addClass("showw1").removeClass("showw");
                            alert("plz fill correct uid");
                    });
                        
                });

    });
</script>
<style>
    
    .rad{
      border-radius: 50%;
}  
      

    
    </style>

<body>
    <!--nav bar------------------------------------------------------------------------->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-info">
       <img src="pics/teamwork-union-people-logo-vector-1556054.jpg" width="40" height="40" class="d-inline-block align-top rad" alt="">
       &nbsp; <a href="#" class="navbar-brand">Manpower</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarmenu">
            <ul class="navbar-nav ml-auto">
               
                <li class="nav-item txt"><a href="#" class="nav-link"><div class="nv"><i class="fa fa-user-circle-o" ></i>&nbsp;<b>About Us</b></div></a></li>
                <li class="nav-item txt"><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModal" id="submitnew"><div class="nv"><i class="fa fa-sign-in"></i>&nbsp;<b>SignUp</b></div></a></li>
                <li class="nav-item txt"><a href="#" class="nav-link" data-toggle="modal" data-target="#loginmodal" id="loginnew"><div class="nv"><i class="fa fa-key" ></i>&nbsp;<b>Login</b></div></a></li>
            </ul>
        </div>
    </nav>
    <!--nav bar--------------over----------------------------------------------------------->
    <!--nav bar--------------crousel----------------------------------------------------------->
 <br> <center> <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="pics/unnamed.gif" class="d-block w-70 " alt="...">
    </div>
   
  </div>
</div>
    </center>
  <div class="container">
    <div class="row">
        <div class="col-md-12 kite">
            <center><b>Our Services</b></center>
        </div>
    </div></div>
    <!--nav bar--------------crousel----------------------------------------------------------->
     
    <!----------------------------------------------signup------------------------------------>
     <div class="container">
        <div class="row mt-5">

            <div class="col-md-4 ">
               
                    <div class="layer">
                    <center>
                     <div class="card card2">
                            <center><img src="pics/job.png" class="cardimages" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Need Work?</b></h5>
                                <p class="card-text">Looking for work !! get work here on basis of skills</p>
                                <center></center>
                            </div>
                        </div>
                        </center></div>
                
            </div>
            <div class="col-md-4 ">
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/can-former-employees-help-you-find-candidates-img.jpg" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Searching!</b></h5>
                                <p class="card-text">Need worker?Search here available worker in your city</p>
                                <center></center>
                            </div>
                        </div>
                    </center>
                </div>

            </div>
             <div class="col-md-4 ">
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/hand.png" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Interact</b></h5>
                                <p class="card-text">We are providing a safe medium for worker and coustmer</p>
                                <center></center>
                            </div>
                        </div>
                    </center>
                </div>

            </div>
         </div>
             <div class="row mt-4">
              <div class="col-md-4 offset-md-2">
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/images%20(2).png" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Post!</b></h5>
                                <p class="card-text">Post your requirement .your post will show to worker</p>
                                <center></center>
                            </div>
                        </div>
                    </center>
                </div>

            </div>

             <div class="col-md-4">
                <div class="layer">
                    <center>
                        <div class="card card2">
                            <center><img src="pics/images%20(3).jpg" class="cardimage" alt="..."></center>
                            <div class="card-body">
                                <h5 class="card-title"><b>Rating</b></h5>
                                <p class="card-text">Choose right person for your work on basis of rating</p>
                                <center></center>
                            </div>
                        </div>
                    </center>
                </div>

            </div>


            </div>
        
    </div>
     <!----------------------------------------------------------------------------------------------------->
        <section class="website-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 feature-box">
                        <img src="pics/38.png">
                        <div class="feature-text">
                            <p><b>100% get Work</b></p>
                        </div>
                    </div>
                     <div class="col-md-3 feature-box">
                        <img src="pics/images%20(3).png">
                        <div class="feature-text">
                            <p><b>after 10 days your post </b>will delete automatically</p>
                        </div>
                    </div>
                <div class="col-md-3 feature-box">
                        <img src="pics/images%20(4).jpg">
                        <div class="feature-text">
                            <p><b>Search on the basis of your city</b></p>
                        </div>
                    </div>
                    <div class="col-md-3 feature-box">
                        <img src="pics/39.png">
                        <div class="feature-text">
                            <p><b>Pay after completion of your work</b></p>
                        </div>
                    </div>
                    
                    </div> 
            </div>
        </section>
        <div class="container">
            <div class="title-box">
                    <h2>Meet the Developer<br></h2>
                    </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class=" col-md-2">
                    <img src="pics/images%20(4).png" height="150px" width="150px">
                </div>
                 <div class=" col-md-1">
                   &nbsp;
                </div>
                <div class="col-md-6">
                    <table border="1" class="tbl" >
                       <tr>
                      
                       
                       </tr>
                       <tr><td class="tdl"> I'm <B>Muskan Goyal</B>,an Engineering student in 2 year.Currently pursuing  degree of B.Tech in stream computer science and engineering.This is my first project made under the guidence of <B>Mr. Rajesh Kumar Bansal</B> training head at <u>Sun-Soft Technologies</u> and founder of Banglore Computer Education plus author of <b>"Real Java"</b>.</td></tr>
                       
                        
                    </table>
                </div>
                
                 <div class=" col-md-2">
                    <img src="pics/images%20(4).png" height="150px" width="150px">
                </div>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------->
         <section class="footer">
            <div class="container tex-center">
                <div class="row">
                    <div class="col-md-3">
                        <h1>Useful links</h1>
                        <p>Privacy Policy</p>
                        <p>Terms of use</p>
                        <p>Return policy</p>
                        <p>Discount coupons</p>
                    </div>
                     <div class="col-md-3">
                        <h1>Company</h1>
                        <p>About us</p>
                        <p>Contact us</p>
                        <p>Career</p>
                        <p>Affiliate</p>
                    </div>
                 
                    
                     <div class="col-md-3">
                        <h1>Follow us on</h1>
                        <p><i class="fa fa-facebook-official" ></i>Facebook</p>
                        <p><i class="fa fa-youtube-play" ></i>Youtube</p>
                        <p><i class="fa fa-linkedin" ></i>Linkedin</p>
                        <p><i class="fa fa-twitter" ></i>Twitter</p>
                    </div>
                    <div class="col-md-3 footer-image">
                        <h1>Reach us</h1>
                        <!--<img src="pics/images%20(1).png">-->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13791.522932618522!2d74.9523281!3d30.2119513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a0d6293513f98ce!2sBanglore%20Computer%20Education%20(C%20C%2B%2B%20Android%20J2EE%20PHP%20Python%20AngularJs%20Spring%20Java%20Training%20Institute)!5e0!3m2!1sen!2sin!4v1594713063351!5m2!1sen!2sin" width="150" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <hr>
                <p class="copyright">&copy;Made by Manpower.com</p>
            </div>
        </section>
        <!---------------------------------------------------------------------------------------------->
    <!----------------------------------------------signup------------------------------------>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-dismiss="modal">
        <div class="modal-dialog">
            <div class="modal-content modal-lg" >
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="exampleModalLabel"><b>SignUp</b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body bg-light">
                    <div id="wait"></div>
                    <div class="form-row">
                         <div class="form-group col-md-12"> <center> </center></div>
                       </div>
                    <form action="submit-process.php" method="post" id="submitf">
                       
                        <div class="form-group col-md-12">
                            <div class="fontuser"> 
                            <label for="txtUid">user id</label>
                            <input type="text" class="form-control id" id="txtUid" name="txtUid" placeholder="Abc1234">
                            <i class="fa fa-user fa-lg"></i>
                            </div> <span id="errUid"></span>

                            <!------------------------------------------------>
                        </div>
                        <div class="form-group col-md-12">
<div class="fontusers"> 
                            <label for="exampleInputPassword1">Password</label>

                            <input type="password" class="form-control id" name="txtPass" id="txtPass"  >
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            </div>  <span id="errpass"></span>

                        </div>
                        <div class="form-group col-md-12">
                           <div class="fontusers"> 
                            <label for="txtMob">Mobile Number</label>
                            <input type="text"  class="form-control id" name="txtMob" id="txtMob" placeholder="&nbsp;xxx-xxx-xxxx" required >
                            <i class="fa fa-phone" ></i>
                            </div>  <span id="errmob"></span>

                        </div>

                       <!-- <label for="txtcat">Category</label><br>-->
                      <center>  <input type="radio" name="option" id="txtRad" value="worker"> Worker &nbsp;
                          <input type="radio" name="option" id="txtRadc" value="citizen"> Citizen <br /></center>



                       <!-- <div class="form-group">
                            <label for="txtstat">status</label>
                            <input type="text" class="form-control" name="txtstat" id="txtstat">
                            <span id="errmob">*</span>
                        </div>-->


                        <div class="form-group col-md-12">
                           <br>
                            <!--  <span id="successmsg" class="text-success"></span>-->
                            <center> <input type="button" value="Signup" name="btn" class="btn btn-success  btn-block" id="submit" style="width:100px"></center>

                           <center><b><span id="successmsg" name="successmsg"></span></b></center> 


                        </div>
                       
                        <div class="form-group col-md-12"><a href="#"class="nav-link" data-toggle="modal" data-target="#loginmodal" id="loginnew"data-dismiss="modal"> <center><span style="color:black">Already a user?</span> Login</center></a></div>


                    </form>
                </div>
                <!--  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>-->

            </div>
        </div>
    </div>
    <!----------------------------------------------signup over------------------------------------>
    <!----------------------------------------------login start------------------------------------>
    <div class="modal fade" id="loginmodal"tabindex="-1" role="dialog" data-dismiss="modal">
        <div class="modal-dialog">
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
                            <input type="text" class="form-control" id="txtuid" name="uid">
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
                          <span id="errboth"></span>
                           <span id="loginmsg" name="loginmsg"></span>
                            <center> <input type="button" value="login" name="login" class="btn btn-danger" id="login" style="width:100px"></center>
                            
                             
                            
                        </div>
                    </form>
                    <a href="#" id="forget">Forget pass?</a>
                </div>
            </div>
        </div>
    </div>
    <!----------------------------------------------login over------------------------------------>
</body></html>