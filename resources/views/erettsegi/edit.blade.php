<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $erettsegi->title }} Szerkesztése</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  <style>
  
    input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: #99ccff;
    }
  
  </style>
</head>
<body class="text-sm">
  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6" style="border-bottom: solid 1px #555;">{{ $erettsegi->title }} Szerkesztése</h1>

    <form action="{{ route('erettsegi.update', $erettsegi->id) }}" method="POST" class="p-4 rounded shadow form-section">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label for="title" class="block text-sm font-medium">Cím</label>
        <input type="text" name="title" id="title" value="{{ $erettsegi->title }}" required class="mt-1 block w-full rounded-md shadow-sm px-2 py-1">
      </div>

      <div class="mb-4">
        <label for="content" class="block text-sm font-medium">Tartalom</label>
        <textarea name="content" id="content" required class="mt-1 block w-full rounded-md shadow-sm px-2 py-1" rows="6">{{ $erettsegi->content }}</textarea>
      </div>

      <div class="mb-4">
        <label for="group_id" class="block text-sm font-medium">Csoport</label>
        <select name="group_id" id="group_id" required class="mt-1 block w-full rounded-md shadow-sm px-2 py-1">
            @foreach ($groups as $group)
                <option value="{{ $group->id }}" {{ $group->id == $erettsegi->group_id ? 'selected' : '' }}>
                    {{ $group->name }}
                </option>
            @endforeach
        </select>
      </div>

      <button type="submit" class="buttonDesign">Mentés</button>
      <a href="{{ route('erettsegi.show', $erettsegi->id) }}" class="buttonDesign" style="padding: 4px 10px;">Mégse</a>
    </form>
  </div>
</body>
</html>
