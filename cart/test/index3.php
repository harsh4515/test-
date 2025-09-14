<!DOCTYPE html>
<html lang="en"> <!-- ❌ was "javascriptreact", fixed to "en" -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AJAX Insert Example</title>
</head>
<body>
  <div>
    <form id="studentform"> <!-- ❌ spelling fixed (studentform) -->
      <label>Enter Fname</label>
      <input type="text" id="fname" name="first_name"><br><br>
      
      <label>Enter Lname</label>
      <input type="text" id="lname" name="last_name"><br><br>
      
      <input type="submit" id="savebtn" value="Save">
    </form>

    <div id="errormsg" style="color:red;"></div>
    <div id="succsmsg" style="color:green;"></div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    
    $(document).ready(function(){
 
      $("#studentform").on("submit",function(e){
    
            e.preventDefault();

            $.ajax({
                url:"insertdata.php",
                type:"POST",
                data:$(this).serialize(),
                success:function(data){
                    if(data==1){

                        $("#succsmsg").html("Data Inserted Successfully").slideDown();
                        $("#errormsg").html("").slideUp();
                    }
                    else
                {  
                    $("#errormsg").html("Data Can't saved").slideDown();
                    $("succsmsg").html("").slideUp();
                    
                }
                }
            


            })



      }) 


    })
  </script>

</body>
</html>