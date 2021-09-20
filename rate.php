
<html>

<head>
    <title>
        rate worker
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="jq/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
     $(document).ready(function() {
         $(function() {

            $("#rateYo").rateYo({
                //starWidth: "40px"
                fullStar: true,
                onSet: function(rating, rateYoInstance) {
                   // alert(rating);
                    $("#rating").val(rating);
                }
            });

        });
         
          $("#submit").click(function() {
              
                 var uid = $("#txtuid").val();
            var total = $("#rating").val();
             // alert(uid);
              //alert(total);
               var actionUrl = "rate-process.php?uid=" + uid + "&total=" + total  ;
          // alert(actionUrl);
            $.get(actionUrl, function(resp) {
                //$("#msgg").html(resp);
alert(resp);

                
                    
            });
          });
     });
    
    
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div>Rate Here</div>
        </div>
<!------------------------------------------------------>
        <form action="" method="post">
            <div>
                <label>Enter worker uid</label>
                <input type="text" name="uid" id="txtuid">
            </div>
            <div class="row">
                <div id="rateYo">

                </div>
               <input type="hidden" id="rating" name="rating">

            </div>
            <div class="row">
                <span id="msgg">*</span>
            </div>
            <div class="row">
                 <div>
                    <br><button class="btn btn-success" id="submit">Rate</button>
                  
                </div>
            </div>
            
        </form>
    </div>
   

</body>

</html>
