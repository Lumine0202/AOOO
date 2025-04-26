<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Érettségi</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/css/style.css">
  
</head>
<body class="text-sm">
  <!-- Menu -->
  <nav class="mt-6 menuDesign">
      <ul class="flex">
      <li onclick="showSection('list-groups')" class="cursor-pointer menu-li-style">Tételek</li>
        <div class="dropdown cursor-pointer">
          <li class="menu-li-style">Hozzáadás</li>
          <ul class="dropdown-content">
            <li onclick="showSection('add-group')" class="cursor-pointer menu-li-style">Csoport hozzáadása</li>
            <li onclick="showSection('add-item')" class="cursor-pointer menu-li-style">Tétel hozzáadása</li>
          </ul>
        </div>
      </ul>
    </nav>
  <div class="container mx-auto p-6">
    

    <!-- Add Group Form -->
    <div id="add-group" class="hidden">
      <h2 class="text-2xl mb-4">Csoport hozzáadása</h2>
      <form action="{{ route('groups.store') }}" method="POST" class="mb-6 form-section">
        @csrf
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium">Csoport neve</label>
          <input type="text" name="name" id="name" placeholder="Csoport neve" required class="mt-1 block w-full rounded-md shadow-sm border px-2 py-1">
        </div>
        <button type="submit" class="buttonDesign">Csoport hozzáadása</button>
      </form>
    </div>

    <!-- Add Item Form -->
    <div id="add-item" class="hidden">
      <h2 class="text-2xl mb-4">Tétel hozzáadása</h2>
      <form action="{{ route('erettsegi.store') }}" method="POST" class="mb-6  form-section">
        @csrf
        <div class="mb-4">
          <label for="title" class="block text-sm font-medium">Cím</label>
          <input type="text" name="title" id="title" placeholder="Cím" required class="mt-1 block w-full rounded-md shadow-sm border px-2 py-1">
        </div>
        <div class="mb-4">
          <label for="content" class="block text-sm font-medium">Tartalom</label>
          <textarea name="content" id="content" placeholder="Tartalom" required class="mt-1 block w-full rounded-md shadow-sm border px-2 py-1"></textarea>
        </div>
        <div class="mb-4">
          <label for="group_id" class="block text-sm font-medium">Csoport</label>
          <select name="group_id" id="group_id" required class="mt-1 block w-full rounded-md shadow-sm border px-2 py-1">
            @foreach ($groups as $group)
              <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="buttonDesign">Tétel hozzáadása</button>
      </form>
    </div>

    <!-- List Groups and Items -->
    <div id="list-groups">
      <h2 class="text-2xl mb-4">Tételek</h2>
      
      <!-- from db -->
      @foreach ($groups as $group)
        <div class="mb-6">         
          <h3 class="text-xl mb-4">{{ $group->name }}</h3>
          <ul class="space-y-4">
            @foreach ($group->erettsegis as $item)
              <li class="p-4 rounded shadow form-section flex justify-between items-center">
                <a href="{{ route('erettsegi.show', $item->id) }}" class="font-medium">{{ $item->title }}</a>
                <form action="{{ route('erettsegi.destroy', $item->id) }}" method="POST" class="inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="buttonDesign">Törlés</button>
                </form>
              </li>
            @endforeach
          </ul>
        </div>
      @endforeach
      <!-- from db -->

    </div>
  </div>

  <script>
    function showSection(sectionId) {
      // Hide all sections
      document.querySelectorAll('#add-group, #add-item, #list-groups').forEach(section => {
        section.classList.add('hidden');
      });

      // Show the selected section
      document.getElementById(sectionId).classList.remove('hidden');
    }

    // Show the "List Groups" section by default
    showSection('list-groups');
  </script>
</body>
</html>
