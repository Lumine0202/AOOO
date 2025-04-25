<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $erettsegi->title }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #333333;
      /* font-family: Georgia, 'Times New Roman', Times, serif; */
      /* font-family: 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Helvetica, sans-serif, 'GNU Unifont'; */
      /* font-family: Tahoma; */
      font-family: sans-serif;
      color: #e6e6e6;
    }
    h1, h2 {
      color: #5998d6;
      border-bottom: solid 1px #555;
      font-family: Georgia, 'Times New Roman', Times, serif;
    }
    h3 {
      font-family: Georgia, 'Times New Roman', Times, serif;
    }
    a {
      color: #e6e6e6;
    }
    .buttonDesign {
        background: linear-gradient(to bottom, #555 45%, #242424 100%);
      color: #ebeeec;
      padding: 2px 10px;
      border: none;
      border-radius: 6px;
      font-family: Arial, sans-serif;
      box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.1),
                  0 1px 2px rgba(0, 0, 0, 0.5);
      cursor: pointer;
    }
    .buttonDesign:hover {
        background-image: linear-gradient(to bottom right, #242424 10%, #555 60%);
    }
  </style>
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
