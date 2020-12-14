<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
<div class="visible-print text-center">
	<h1>QR Code</h1>
    {!! QrCode::size(500)->generate($qr); !!}
</div>
</center>
</body>
</html>
