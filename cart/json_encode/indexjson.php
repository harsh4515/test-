<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP with Ajax and JSON</title>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>PHP with Ajax and JSON</h1>
        </div>

        <table id="studentTable" border="1" cellpadding="10px" width="100%">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
            </tr>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    $.ajax({
        url: "fetch_json.php",
        type: "GET",
        dataType: "json",
        success: function(data){
            $.each(data, function(key, value){
                $("#studentTable").append(
                    "<tr><td>" + value.id + "</td><td>" + 
                    value.student_name + "</td><td>" + 
                    value.age + "</td><td>" + 
                    value.city + "</td></tr>"
                );
            });
        }
    });
    </script>
</body>
</html>
