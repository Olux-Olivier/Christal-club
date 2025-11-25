<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>QR Test</title>
</head>
<body>

<h1>QR Code Menu Christal Club</h1>

{!! QrCode::size(300)->generate(url('/')) !!}

</body>
</html>
