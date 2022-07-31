<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Verifikasi Email</title>
</head>
<body>
	Klik link berikut untuk verifikasi akun anda : <a href="<?= url('auth/verify').'?email='.$_POST['email'].'&token='.urlencode($token) ?>">Aktifkan</a>
</body>
</html>