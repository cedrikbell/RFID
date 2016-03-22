
<?php
include('session.php');
include 'RfidController.php';
$rC = new RfidController();
$rC->printHTMLHEADER();
$rfid = $rC->getNewrfid();	
$rfid->generateSelectrfidForm();
$rC->printHTMLFOOTER();
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome: <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
</div>
</body>
</html>

<!-- Agarwal, Nareej. "PHP Login Form with Sessions." PHP Login Form with Sessions. Formget, n.d. Web. 26 Feb. 2016. <http://www.formget.com/login-form-in-php/> -->