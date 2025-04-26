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