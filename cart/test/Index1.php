<!DOCTYPE html>
<html lang="javascriptreact">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- Simple Form -->
<form id="studentForm">
  <label>First Name:</label>
  <input type="text" name="first_name" id="fname"><br><br>

  <label>Last Name:</label>
  <input type="text" name="last_name" id="lname"><br><br>

  <input type="submit" id="savebtn" value="Save">
</form>

<!-- Messages -->
<div id="succs-msg" style="color:green; display:none;"></div>
<div id="err-msg" style="color:red; display:none;"></div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    $(document).ready(function(){

  // When form is submitted
  $("#studentForm").on("submit", function(e){
    e.preventDefault(); // 🔹 stop default form submission

    // 🔹 serialize() = collect all form inputs as key=value&key=value string
    var formData = $(this).serialize();

    $.ajax({
      url: "insertajax.php",  // 🔹 PHP file to process
      type: "POST",
      data: formData,     // 🔹 send serialized form data

      success: function(data){
        if(data == 1){
          // Success
          $("#succs-msg").html("Data Inserted Successfully").slideDown();
          $("#err-msg").slideUp();
          $("#studentForm")[0].reset(); // clear form
          loadtable(); // refresh data table (your function)
        } else {
          // Error
          $("#err-msg").html("Can't Save Record").slideDown();
          $("#succs-msg").slideUp();
        }
      }
    });
  });

});

</script>
</body>
</html>