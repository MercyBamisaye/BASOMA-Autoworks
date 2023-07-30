// JavaScript can be used for handling click events and navigation if required.
// For demonstration purposes, let's just log a message when clicking on the links.

document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.features a');
    links.forEach(link => {
    link.addEventListener('click', function(event) {
    event.preventDefault();
    console.log(`Navigating to: ${link.getAttribute('href')}`);
    });
    });
    });