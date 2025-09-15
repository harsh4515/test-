<?php 

$emp =[
    [1,"Harsh","Salesman",50000],
    [2,"jay","Salesman",50000],
    [3,"lalo","salesing",50000],
    [4,"mami","marketing",40000],
    [5,"dishu","majoor",6000]
];
echo "<table border='1px' cellpadding='5px' cellspacing='0px'>";

    foreach($emp as list($id,$name,$designation,$salary)){
        echo"<tr><td>$id</td><td>$name</td><td>$designation</td><td>$salary</td></tr>";
    }
  echo "</table>";
?>
s