<?php
session_start();
include 'baglanti.php';
if (isset($_POST['login'])) {
	$mail = $_POST['mail'];
	$password = $_POST['password'];

	$query ="SELECT * FROM uyeler WHERE mail=:mail AND password=:password";
	$statement = $conn->prepare($query);  
	$statement->execute(  
		array(  
			'mail' => $_POST["mail"],  
			'password' => sha1(md5($_POST["password"]))  
		)  
	);  
	$count = $statement->rowCount();  
	if($count > 0)  
	{  
		$_SESSION["mail"] = $_POST["mail"];  
		$alert = array
		(
			'type' => "success",
			'msg' => "Başarıyla giriş yaptınız. Anasayfaya yönlendiriliyorsunuz.",
			'second' => "2",
			'url' => "html/index.php"
		);
	}else  
	{  
		$alert = array
		(
			'type' => "danger",
			'msg' => "Hatalı şifre veya kullanıcı adı !",
			'second' => "2",
			'url' => "login.php"
		); 
	}  

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Giriş Yap</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title">
						İlyün Bilişim Sistemleri
					</span>
					<?php
					if (isset($alert)) { ?>
						<div class="alert alert-<?php echo $alert['type'] ?>"><?php echo $alert['msg'] ?></div>
						<?php

						if ($alert['url'] != "0") { ?>
							<meta http-equiv="refresh" content="<?php echo $alert['second'] ?>;URL=<?php echo $alert['url'] ?>">
						<?php } else { ?>
							<meta http-equiv="refresh" content="<?php echo $alert['second'] ?>;">
						<?php } ?>
					<?php } ?>
					<div class="wrap-input100 validate-input" data-validate = "Lütfen emailinizi doğru sekilde giriniz: ex@abc.xyz">
						<input class="input100" type="text" name="mail" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Şifrenizi giriniz.">
						<input class="input100" type="password" name="password" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" name="login" class="login100-form-btn">
							Giriş Yap
						</button>
					</div>

					<div class="text-center p-t-136">		
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>