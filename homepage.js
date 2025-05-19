// Select the menu icon and the navbar
let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

// Add an onclick event to toggle classes on the menu icon and navbar
menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('active');
}

// Add an onscroll event to remove classes from the menu icon and navbar
window.onscroll = () => {
    menu.classList.remove('bx-x');
    navbar.classList.remove('active');
}

// Initialize ScrollReveal with specific parameters
const sr = ScrollReveal({
    distance: '60px',
    duration: 2500,
    delay: 200,
    reset: true
});

// Apply ScrollReveal animations to specified elements
sr.reveal('.text', { delay: 100, origin: 'top' });
sr.reveal('.form-container form', { delay: 200, origin: 'right' });
sr.reveal('.heading', { delay: 400, origin: 'top' });
sr.reveal('.ride-container .box', { delay: 150, origin: 'top' });
sr.reveal('.services-container .box', { delay: 150, origin: 'top' });
sr.reveal('.about-container .box', { delay: 150, origin: 'top' });
sr.reveal('.reviews-container', { delay: 150, origin: 'top' });
sr.reveal('.newsletter .box', { delay: 100, origin: 'bottom' });
sr.reveal('.card__container', { delay: 150, origin: 'bottom' });