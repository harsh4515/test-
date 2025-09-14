<!DOCTYPE html>
<html lang="javascriptreact">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
   <form id="formdata">
   
        <label>First Name</label>
        <input type="text"  id="fname" name="first_name"><br><br><br>   
        <label>Last Name</label>
        <input type="text"  id="lname" name="last_name"><br><br><br>   
        

        <input type="submit" value="submit" id="savebtn">

   </form>




    </div>
    <div id="error_msg"></div>
     <div id="succs_msg"></div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

$(document).ready(function(){


    $("#formdata").on("submit",function(e){

e.preventDefault();

    $.ajax({
      url:"Insertexam.php",
      type:"POST",
      data:$(this).serialize(),
      success:function(data){
 
        if(data == 1){

            $("#succs_msg").html("Data inserted Succesfully").slideDown();
            $("#error_msg").html("").slideUp();


            $("#formdata")[0].reset();
        }
else{
 $("#error_msg").html("Data can't save").slideDown();
 $("#succs_msg").html("").slideUp();

}
      }


  


    })

    })


})

</script>

</body>

</html>