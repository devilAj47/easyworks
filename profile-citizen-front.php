<?php session_start();?>
  <html>
   
    <head>
        <title>Profile-citizen</title>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="jq/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--********************style************************************-->
  
    <style>
        .bg{
            
            background: url('pics/') no-repeat;
          
           /* align-items: center !important;*/
            background-color: lightgoldenrodyellow; 
        }
        .form-container{
            position: absolute;
           top: 80; 
            /*cursor: pointer;*/
           
            background-color: lightgoldenrodyellow;
            padding: 10px;
            box-shadow: 0px 0px 10px 0px black;
        }
    
    </style>
    <script>
	function showpreview(file) {

        if (file.files && file.files[0])
		 {
            var reader = new FileReader();
            reader.onload = function (ev) {
                $('#prev').attr('src', ev.target.result);
            }
            reader.readAsDataURL(file.files[0]);
        }

    }
	
	</script>
    <script>
    $(document).ready(function(){
		
		//==-=-=-==-=-
        //--=-=-=-=-JSON=-=-=-=-=-=-=-=-=
			$("#btnFetchProfile").click(function() {
				//alert();
                var uid=$("#txtuid").val();
               //alert(uid);
				var url="profile-citizen-json.php?uid="+uid;
				//0 or 1 possibility
				$.getJSON(url, function(jsonAryResponse) {
					//alert(JSON.stringify(jsonAryResponse));
					//alert(jsonAryResponse.length);
                    if(jsonAryResponse.length==0)
						alert("invalid id or fill your record first");
					else
						{
							$("#txtname").val(jsonAryResponse[0].name);//use table col. name
							$("#txtmob").val(jsonAryResponse[0].mobile);//use table col. name
							$("#txtadd").val(jsonAryResponse[0].address);//use table col. name
							$("#txtcity").val(jsonAryResponse[0].city);//use table col. name
							$("#txtstat").val(jsonAryResponse[0].state);//use table col. name
							
                            $("#prev").attr("src","upload/"+jsonAryResponse[0].orgName);
                             $("#hdn").val(jsonAryResponse[0].orgName);
                            $("#txtemail").val(jsonAryResponse[0].email);//use table col. name
							
						}
					
				});
			});
    });
    
    
    </script>
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
        .ids{
        
       padding-left: 32px;
    }
.fontusers { 
            position: relative; 
       
        } 
        .fontusers i{ 
            position: absolute; 
            left: 5px; 
            top: 38px; 
            color: black;
           font-size: 30px;
           /* background-color: gainsboro;*/
        } 
        .comb{
            
            width: 200px;
            height: 35px;
        }
	</style>
	  <style>
     .kite{
           /* background-color: lightslategrey;*/
            background-color:dimgray;*/
         /* background-color: #FF9966;*/
            opacity: .8;
           
            height: 50px;
            font-style:oblique ;
            font-size: 30px;
            color: whitesmoke;
            
            
        }
    </style>


    </head>
    <body>
    <center>
     <nav class="navbar navbar-expand-sm navbar-dark bg-info ">
       <img src="pics/teamwork-union-people-logo-vector-1556054.jpg" width="40" height="40" class="d-inline-block align-top" alt=""style="border-radius:50%">
       &nbsp; <a href="#" class="navbar-brand">&nbsp;Manpower</a>
      
        

    </nav>
    
    <br>
       <div class="container">
    <div class="row">
        <div class="col-md-12 kite">
            <center><b>My Profile</b></center>
        </div>
    </div></div>
       
    
     <div class="container bg">
        <br>
        <div class="container">
         <div class="row">
                <div class="col-md-12">
                    <img src="pics/undraw_profile_details_f8b7.png"height="200px" >
                </div>
            </div>
         </div>
            <br>
         <div class="row ">
          <div class="col-md-12  ">
                <!--form******************************************************************-->
                
                 <form action="profile-citizen-process.php" method="post" enctype="multipart/form-data" >
               <input type="hidden" id="hdn" name="hdn">
	
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <div class="fontuser"> 
                    <label for=""><b>User id</b></label>
   <input type="text" class="form-control id" id="txtuid" name="txtuid" placeholder="Enter user id" value='<?php  echo $_SESSION["user"];?>'required>
                   <i class="fa fa-user fa-lg"></i> 
                    </div>  
                   
                </div>
                <div class="col-md-4 form-group">
					<label for="">&nbsp;</label>
					<input type="button" id="btnFetchProfile" class="form-control btn btn-secondary" value="Fetch Profile">

				</div>
            </div>
            <!--uid next citizen name--->
            <div class="form-row">
                <div class="col-md-6 form-group">
                     <div class="fontuser"> 
                         <label for=""><b>Name</b></label>
                    <input type="text" class="form-control id"id="txtname" name="txtname" placeholder="full name" required>
                     <i class="fa fa-user fa-lg"></i> 
                    </div>   </div>
                <div class="col-md-6 form-group">
                     <div class="fontusers">
                         <label for=""><b>Mobile</b></label>
                    <input type="text" class="form-control id" name="txtmob" id="txtmob"placeholder="xxx-xxx-xxxx" required>
                    <i class="fa fa-mobile" ></i>
                    </div>  </div>
            </div>
             <!--name and mobile--->
              <div class="form-row">
                <div class="col-md-12 form-group">
                    <div class="fontusers">
                        <label for=""><b>Address</b></label>
                    <input type="text" class="form-control ids" name="txtadd" id="txtadd" required placeholder="not more than 150 words">
                   <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div></div>
                 </div>
               <!--address--->
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for=""><b>City</b></label>
                    <input type="text" class="form-control " name="txtcity" id="txtcity"required>
                </div>
                <div class="col-md-6 form-group">
                    <label for=""><b>State</b></label><br>
                   <!-- <input type="text" class="form-control" name="txtstat" id="txtstat">-->
                    <select name="txtstat" id="txtstat" class="comb" required>
                        <option Selected><b>choose below</b></option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
                          </select>
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6">
                    <label for=""><b>Upload Pic</b></label>
                
                    <input type="file" name="profilePic" id="profilePic" onchange="showpreview(this);" >
                </div>
                 <div class="col-md-6 form-group">
                   <div class="fontuser">
                    <label for=""><b>Email</b></label>
                    <input type="text" class="form-control id" name="txtemail" id="txtemail"placeholder="abc@gmail.com" required>
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                     </div>  </div>
               
            </div>
            <!-------------------------------------------------------------->
            <div class="form-row">
                 <div class="col-md-4">
                    <img src="pics/pic%20upload.jpg" id="prev"width="100" height="100" alt="">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <center><br><br>
                        <input type="submit" value="Save" name="btn" class="btn btn-success" style="width:100px">
  
                        <input type="submit" value="update" name="btn" class="btn btn-danger" style="width:100px">
                       
                    </center>
                </div>
            </div>

        </form>
                
           
                <!--form******************************************************************-->
             </div>
         </div>
     </div>
        </center>
    </body>
</html>