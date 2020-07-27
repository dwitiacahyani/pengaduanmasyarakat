<!DOCTYPE html>
<html>
<head>
	<title>Email To Desa</title>
</head>
<body style="border: 1px solid whitesmoke; padding: 10px;">
	<div>
		<p>Hi, {{$name}},</p>
		<p>{{$body}}</p>
		<p>Mohon balas ke email ini {{$to_email}}</p>
	</div>
	<div style="margin-top: 30px">
		<p style="margin-bottom: 15px;">Dengan hormat,</p>
		<p>{{$to_name}}</p>
	</div>
</body>
</html>