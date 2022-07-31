<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password</title>
</head>
<body>
	Klik link berikut untuk untuk mereset password anda : <a href="<?= url('auth/reset').'?email='.$_POST['email'].'&token='.urlencode($token) ?>">Reset</a>
</body>
</html>