<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Christal Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      body {
        background: url('https://ton-domaine.com/images/dark-gold-bg.jpg') center/cover no-repeat;
      }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-black">

  <div class="text-center">
    <!-- Logo -->
    <img src="https://ton-domaine.com/images/cristal-logo.svg" alt="Le Christal Club" class="mx-auto w-48 h-auto">

    <!-- Texte de bienvenue -->
    <h1 class="mt-6 text-4xl font-bold text-yellow-500 uppercase tracking-wide">Bienvenue au Christal Club</h1>
  </div>

  <script>
    // Rediriger après 2 secondes
    setTimeout(function () {
      window.location.href = "{{ route('plats') }}";
    }, 2000);
  </script>

</body>
</html>
