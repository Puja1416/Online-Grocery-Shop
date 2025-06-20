<?php
$host = "localhost";
$port = "5432";
$dbname = "test";
$user = "postgres";
$password = "postgres"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);
if(isset($_POST['submit'])&&!empty($_POST['submit']))
{
    $hashpassword = md5($_POST['pwd']);
    $sql ="select *from public.user where email = '".pg_escape_string($_POST['email'])."' and password ='".$hashpassword."'";
    $data = pg_query($dbconn,$sql);
	if($pg_num_rows($data)=== 1){
			$row = pg_fetch_assoc($result);

            if ($row['email'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['email'] = $row['email'];

                $_SESSION['name'] = $row['name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.html");

                exit()
			}else{
        
        echo "Invalid Details";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login </title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div id="main_container">
 <div id="header">
	 <div class="top_right">
      <div class="big_banner"><img src="images/banner728.jpg" alt="" border="0" /></div>
    </div>
    <div id="logo"> <img src="images/logo.png" alt="" border="0" width="182" height="85" /> </div>
  <div id="main_content">
    <div id="menu_tab">
    <ul class="menu">
        <li><a href="home.html" class="nav"> Home </a></li>
        <li class="divider"></li>
        <li><a href="index5.html" class="nav">Grocery</a></li>
        <li class="divider"></li>
        <li><a href="index3.html" class="nav">Health & personal</a></li>
        <li class="divider"></li>
         <li><a href="index.html" class="nav">cofee & tea</a></li>
        <li class="divider"></li>
        <li><a href="snacks.html" class="nav">snacks</a></li>
        <li class="divider"></li>
        <li><a href="HEALTHCARE.html" class="nav">Beauty</a></li>
        <li class="divider"></li>
        <li><a href="index2.html" class="nav">Household </a></li>
        <li class="divider"></li>
       <li><a href="index4.html" class="nav">baking</a></li>
        <li class="divider"></li>
        <li><a href="index6.html" class="nav">Ready to cook</a></li>
      </ul>
    </div>
<div class="container">
  <h2>Login Here </h2>
  <form method="post">
  
     
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    
     
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Login">
	
	 
  </form>
</div>

</body>
</html>