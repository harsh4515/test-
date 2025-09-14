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

  <!-- ✅ jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script>
  $(document).ready(function(){

    // ❌ You used "click" on the form, it must be "submit"
    $("#studentform").on("submit", function(e){
      e.preventDefault(); // stop page refresh

      $.ajax({
        url: "Insertdata.php",
        type: "POST",
        data: $(this).serialize(), // ❌ was ($this), fixed to $(this)
        success: function(data){

          if(data == 1){
            $("#succsmsg").html("Data Inserted Successfully").slideDown(); // ❌ was sideDown()
            $("#errormsg").html("").slideUp();
            $("#studentform")[0].reset(); // reset form
          } else {
            $("#errormsg").html("Data Can't Save").slideDown();
            $("#succsmsg").html("").slideUp(); // ❌ was sideUp()
          }

        }
      });

    });

  });
  </script>
</body>
</html>
