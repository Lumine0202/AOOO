<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $erettsegi->title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">

</head>
<body class="text-sm">
  <div class="max-w-3xl mx-auto p-6">

    <h1 class="text-3xl mb-4">{{ $erettsegi->title }}</h1>

    <div class="text-base whitespace-pre-wrap p-4 mb-6">
      {{ $erettsegi->content }}
    </div>

    <div class="flex gap-2">
      <a href="{{ route('erettsegi.index') }}"
         class="buttonDesign">
         Vissza
      </a>
      <a href="{{ route('erettsegi.edit', $erettsegi->id) }}"
         class="buttonDesign">
         Szerkesztés
      </a>
    </div>

  </div>
</body>
</html>
