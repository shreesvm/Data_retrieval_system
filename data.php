<?php 
 
$server="localhost"; 
 
$user = "root";  

 $password = '';  
 $db_name = "student";

 $link = mysqli_connect($server,$user,$password,$db_name);
  
if(mysqli_connect_errno()) 

{  

 die("Failed to connect with MySQL:".mysqli_connect_error());} 
 
else
{
 
 
  echo " ";


}


$uid = $_POST['user'];

$pass= $_POST['password'];
$reg=$_POST['reg'];
   $sql = "SELECT * FROM data WHERE User = '$uid'and pass='$pass'" ;

   $rows = mysqli_query($link , $sql); 
    
if(!$rows)
 
   { 

        $error = "SQL error: " . mysql_error();
 
    } 
  
   elseif(mysqli_num_rows($rows) == 0)
 { 

        $error = "No such user name found";
  } 

    else

  {
 
        $error = FALSE;

        while($row_value = mysqli_fetch_array($rows))
 
       {
  
  
         $name =$row_value["Name"];

         $reg =$row_value["Reg"];

         $dob=$row_value["DOB"];

         $m1 =$row_value["Mark1"];

	 $m2 =$row_value["Mark2"];

	 $col=$row_value["col"];

         $phone =$row_value["MOBILE_NO"];
 
         $email =$row_value["EMAIL"];
  
         $result =$row_value["result"];

      }
        
   }
 
?> 


<html>

<head>
 
<title>DATA RETRIEVAL</title> 

<link rel="stylesheet" href="ite.css" type=
"text/css">
</head> 

<body>


<?php 
 
   if($error)
 { 
     
   echo "<h1>Error accessing user information</h1>\n"; 
 
   echo "<p>$error</p>\n"; 

 }
 else 
  { 
    echo "<h1><center>STUDENT RESULT<br>OF<br>$name</center></h1>";
 
          echo "<div><p>NAME: $name</p>\n";
           echo "<p>REG NO: $reg</p>\n";

           echo "<p>COLLEGE NAME: $col </p>\n";
   

           echo "<p>DOB: $dob </p>\n";
 
           echo "<p>MOBILE NUMBER: $phone</p>\n";
     
           echo "<p>MATHS: $m1 </p>\n";
   
           echo "<p>ITE: $m2</p>\n";

           echo "<p>RESULT: $result</p>\n";
    
            echo "<p>EMAIL: $email</p></div>\n";
   
  }
 
?>
 
</body>
 
</html>