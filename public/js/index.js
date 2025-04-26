function showSection(sectionId) {
    // Hide all sections
    document.querySelectorAll('#add-group, #add-item, #list-groups').forEach(section => {
        section.classList.add('hidden');
    });

    // Get the section by ID
    const section = document.getElementById(sectionId);

    // Check if the section exists
    if (section) {
        section.classList.remove('hidden');
    } else {
        console.error(`Element with ID "${sectionId}" not found.`);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    showSection('list-groups');
});