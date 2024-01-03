const navbar = document.querySelector('nav');


window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
        navbar.classList.add('active');
        navbar.classList.add('shadow-lg');
    } else {
        navbar.classList.remove('active');
        navbar.classList.remove('shadow-lg');

    }

})
