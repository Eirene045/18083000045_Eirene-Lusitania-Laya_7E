<?php
	session_start();
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #090910;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 20%;
  border-radius: 30%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
}
</style>
</head>
<body>

<h2 align="center">LOGIN EETUBOUQUET</h2>

<form method="post">
  <div class="imgcontainer">
    <img src="bouquet.PNG" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Masukkan Username" name="fusername" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Masukkan Password" name="fpassword" required>
        
    <button type="submit" name="fmasuk">Login</button>
  </div>
</form>

</body>
</html>

<?php
	if (isset($_POST['fmasuk'])) {
		$Username = $_POST['fusername'];
		$Password = $_POST['fpassword'];
		$qry = mysqli_query($koneksi, "SELECT * FROM tabel_login WHERE Username = '$Username' AND Password = md5('$Password')");
		$cek = mysqli_num_rows($qry);
			if ($cek==1) {
				$_SESSION['userweb']=$Username;
				header("location:index.php");
				exit;
			}
			else {
        echo '<script>alert("Maaf username dan password anda salah")</script>';
			}		
	}
?>
