<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code | Christal Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen p-4">

    <div class="text-center bg-gray-800 p-8 rounded-3xl shadow-2xl max-w-md w-full border border-gray-700">

        <!-- Titre -->
        <h1 class="text-3xl font-extrabold mb-6 tracking-wide text-yellow-400">
            QR Code Menu Christal Club
        </h1>

        <!-- Ligne décorative -->
        <div class="w-24 h-1 bg-yellow-500 mx-auto mb-6"></div>

        <!-- QR Code -->
        <div class="flex justify-center mb-6">
            {!! QrCode::size(260)->generate(url('/')) !!}
        </div>

        <!-- Texte d'instruction -->
        <p class="text-gray-300 text-lg">
            Scannez ce QR Code pour accéder au menu complet du Christal Club.
        </p>

    </div>

</body>
</html>

