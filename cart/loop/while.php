<?php 

$emp =[
    [1,"Harsh","Salesman",50000],
    [2,"jay","Salesman",50000],
    [3,"lalo","Salesman",50000],
    [4,"mami","marketing",50000],
    [5,"dishu","majoor",50000]
];

echo "<table border='1px' cellpadding='5px'>";
foreach($emp as $v1){

    echo "<tr>";
    foreach($v1 as $v2){
echo "<td> $v2</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
