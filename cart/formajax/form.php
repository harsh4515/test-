<!DOCTYPE html>
<html lang="javascriptreact">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Record with PHP & Ajax</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 40px;
      background: #f4f7f9;
    }

    #main {
      width: 80%;
      margin: auto;
      border: 1px solid #ccc;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    }

    #header {
      background: #007bff;
      color: #fff;
      text-align: center;
      padding: 15px 0;
      border-radius: 10px 10px 0 0;
    }

    #tableform {
      padding: 20px;
      text-align: center;
      background: #f9f9f9;
    }

    #tableform input[type="text"] {
      padding: 8px;
      margin: 5px;
      width: 200px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    #tableform input[type="submit"] {
      padding: 8px 15px;
      border: none;
      background: #007bff;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.3s;
    }

    #tableform input[type="submit"]:hover {
      background: #0056b3;
    }

    #tabledata {
      padding: 20px;
    }

    #tabledata table {
      width: 100%;
      border-collapse: collapse;
    }

    #tabledata th {
      background: #007bff;
      color: #fff;
      padding: 12px;
      text-align: center;
    }

    #tabledata td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }

    #tabledata tr:nth-child(even) {
      background: #f2f2f2;
    }
    #errormessage{
        color:red;
    }
    #successmessage{
color:green;
    }
   .delete-btn{
      background:red;
      color:white; 
      border:2px solid white;
      height:30px;
      width: 160px;
      border-radius:6px;
      font-size:15px;
    }
     .edit-btn{
      background:green;
      color:white; 
      border:2px solid white;
      height:30px;
      width: 160px;
      border-radius:6px;
      font-size:15px;
    }
    #modal{
      background:rgba(0,0,0,0.7);
      position:fixed;
      left:0;
      top:0;
      width:100%;
      height:100%;
        justify-content: center;   /* horizontal center */
  align-items: center;
      display:none;
z-index: 100;
    }
   #model-form{
    background:#fff;
    width: 30%;
    position: relative;
    top:20%;
    left:calc(50%-15%);
    padding:15px;
    border-radius:4px; 
     justify-content:center;
   } 
#close-btn{
background:red;
color:white;
width:30px;
height:30px;
line-height:30px;
text-align:center;
border-radius:50%;
position: absolute;
top:-15px;
right:-15px;
cursor:pointer;
}
#model-form h2 
   {
margin:  0 0 15px;
padding-bottom: 
   }
   #model-form td {
  padding: 6px;
  font-weight: bold;
  color: #333;
}

#model-form input[type="text"] {
  width: 95%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 14px;
}

#model-form input[type="submit"] {
  background: #007bff;
  color: #fff;
  padding: 8px 16px;
  border: none;
  border-radius: 6px;
  font-size: 14px;
  cursor: pointer;
  transition: 0.3s;
}

#model-form input[type="submit"]:hover {
  background: #0056b3;
}

  </style>
</head>
<body>
  <table id="main" cellspacing="0">
    <tr>
      <td id="header">
        <h1>Add Record with PHP & Ajax</h1>
      <div id="serach">
        <label>Search</label>
     <input type="text" id="search" autocomplete="off">

      </div>
      </td>
    </tr>
    <tr>
      <td id="tableform">
        First Name: <input type="text" id="fname">
        Last Name: <input type="text" id="lname">
        <input type="submit" id="savebtn" value="Save">
          <div id="errormessage"></div>
  <div id="successmessage"></div>
      </td>
      
    </tr>
    <tr>
      <td id="tabledata">
        <table border="1" cellspacing="0" cellpadding="10px">
          
          <tr>
            <th width="100px">Id</th>
            <th width="100px">Name</th>
          </tr>
          <tr>
            <td>1</td>
            <td>Harsh Khatri</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <div id="modal">

    <div id="model-form">
      
      <h2>Edit Form</h2>
      <table cellpadding="0" width="100%">
        
      </table>
      <div id="close-btn">x</div>
    </div>
</div>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $(document).ready(function(){
        function loadtable(){
            $.ajax({
                url:"ajaxload.php",
                type:"POST",
                success:function(data){
                    $("#tabledata").html(data);
                }
            })
        }
        loadtable();

        $("#savebtn").on("click",function(e){   // fixed "Click" to "click"
            e.preventDefault();

            var fname = $("#fname").val();
            var lname = $("#lname").val();

            if(fname === "" || lname === ""){
//alert("Please enter both First Name and Last Name");
                $("#errormessage").html("All Field are required").slidedown();

$("#successmessage").html("").slideup();

                return;
            }

            $.ajax({
                url:"insert.php",
                type:"POST",
                data:{first_name:fname, last_name:lname},
                success:function(data){
                    if(data == 1){
                        loadtable();
                        $("#fname").val(""); // clear input
                        $("#lname").val("");  
                        $("#successmessage").html("Data Inserted Succesfully ").slideDown();
                        $("#errormessage").html("").slideUp();

                    }else{
                       // alert("Can't Save Record"); 
                       $("#errormessage").html("All Field are required").css("color","red").slideDown();
                       
                       $("#successmessage").html("").slideUp();
                       $("#successmessage").css("color","green")

                      }
                }
            })
        });

$(document).on("click",".delete-btn", function(){
  if(confirm("Do you really want to delete this record?")){
    var studentid = $(this).data("id");
    var element = this;

    $.ajax({
      url:"delete.php",
      type:"POST",
      data:{id:studentid},
      success:function(data){
        if(data != 0){
          $(element).closest("tr").fadeOut();

          // show deleted record name
          $("#successmessage").html("Deleted Record: " + data)
                             .slideDown();

          $("#errormessage").html("").slideUp();
        } else {
          $("#errormessage").html("Can't Delete Record (ID: " + studentid + ")")
                            .slideDown();
          $("#successmessage").html("").slideUp();
        }
      }
    })
  }
 
});

 $(document).on("click",".edit-btn", function(){

    $("#modal").show();
    var studentid = $(this).data("id");
    //alert(studentid); 
    $.ajax({
      url:"updateload.php",
      type:"POST",
      data:{id:studentid}, 
      success:function(data){
          $("#model-form table").html(data);
      }
    })

  });
  $(document).on("click","#close-btn", function(){

    $("#modal").hide();
    

  });
 $(document).on("click", "#edit-submit", function(){
    var stuid = $("#edit-id").val();
    var fname = $("#edit-fname").val();
    var lname = $("#edit-lname").val();

    $.ajax({
      url:"update.php",
      type:"POST",
      data:{id:stuid, first_name:fname, last_name:lname},
      success:function(data){
        if($.trim(data) == "1"){
          $("#modal").hide(); 
          loadtable(); // refresh updated data
          $("#successmessage").html("Record Updated Successfully").slideDown();
          $("#errormessage").html("").slideUp();
        } else {
          $("#errormessage").html("Update Failed").slideDown();
        }
      }
    });
});

$("#search").on("keyup", function(){
  var search_value  = $(this).val();

  $.ajax({
    url:"searchdata.php",
    type:"POST",
    data:{search:search_value},
    success:function(data){
      $("#tabledata").html(data);
    }
  });
});

    });


  </script>



</body>
</html>
