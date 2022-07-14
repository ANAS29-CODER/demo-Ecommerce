<?php



$con= mysqli_connect('localhost','root','','project');
$query='select * FROM admin';

$result= mysqli_query($con,$query);

while ($row=mysqli_fetch_assoc($result)) {
  echo "asss";
  // code...
}