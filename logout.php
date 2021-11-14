<?php
	echo "<script>
	if (confirm('Anda akan LOGOUT?')) { 
	   window.location='DESTINATION'; 
	}else{
	   // do other thing
	}
	</script>";

	session_start();
	$_SESSION['userweb']="";
	header("location:login.php");
	exit;
?>
