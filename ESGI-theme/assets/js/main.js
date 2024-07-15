// Get the menu icon element
const menuIcon = document.querySelector('#menu');

// Get the unfold menu element
const unfoldMenu = document.querySelector('.unfold-menu');

// Add a click event listener to the menu icon to toggle the menu
menuIcon.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent the default anchor action
    // Toggle the class to show/hide the menu
    unfoldMenu.classList.toggle('active');
});