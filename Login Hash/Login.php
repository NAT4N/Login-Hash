<?php
include ('connect.php');

if(isset($_POST['cadastrar']))
{
$user = $_POST['user'];
$pass = $_POST['senha'];

$pass = password_hash ($pass , PASSWORD_DEFAULT);


$sql = "INSERT INTO login (User, password) values ('$user','$pass')";
$res = mysqli_query($connection, $sql);


}

if(isset($_POST['login']))
{

$user = $_POST['user'];
$pass = $_POST['senha'];

$sql = "SELECT * FROM login WHERE User='$user'";
$res = mysqli_query($connection, $sql);
$countrows = mysqli_num_rows($res);

if($countrows == 1)
{

while ($r = mysqli_fetch_assoc($res)) 
{
	$hash = $r['password'];

if (password_verify($pass, $hash)) {?>

 <div class="alert alert-success" role="alert">Password is valid! Login success</div>

<?php
} else { ?>

<div class="alert alert-danger" role="alert">Invalid password</div>

<?php

}

}

}else{?>
<div class="alert alert-danger" role="alert">Not exists username in database</div>
<?php
}


}
	

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<br><br><br><br><br><br>
<center>
<h1>Login HASH</h1>
<br><br><br>
<form method="POST">
	<input type="text" name="user" placeholder="Username"><br><br>
	<input type="password" name="senha" placeholder="Password"><br><br>
	<button type="submit" class="btn btn-secondary" name="cadastrar">Cadastrar</button>
	<button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
<br><br><br>
<h5>Developed by NAT4N</h5>
<h5><a href="https://github.com/NAT4N">https://github.com/NAT4N</a></h5>
</center>
</body>
</html>