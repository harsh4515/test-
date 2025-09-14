<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Date Picker Filter with Search</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- jQuery UI for Datepicker -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
  <h2>Filter Records</h2>
  
  <label>Start Date:</label>
  <input type="text" id="start_date">

  <label>End Date:</label>
  <input type="text" id="end_date">

  <label>Search:</label>
  <input type="text" id="search" placeholder="Enter keyword...">

  <button id="filterBtn">Filter</button>

  <br><br>
  <div id="result"></div>

<script>
$(function() {
  // Datepicker initialization
  $("#start_date, #end_date").datepicker({ dateFormat: 'yy-mm-dd' });

  // Filter button click
  $("#filterBtn").on("click", function() {
    var start = $("#start_date").val();
    var end   = $("#end_date").val();
    var search = $("#search").val();

    $.ajax({
      url: "fetch.php",
      type: "POST",
      data: { start_date: start, end_date: end, search: search },
      success: function(data) {
        $("#result").html(data);
      }
    });
  });
});
</script>
</body>
</html>
