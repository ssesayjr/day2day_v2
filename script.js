
const heroContent = document.querySelector('.hero-content');

window.addEventListener('scroll', () => {
    let scrollPos = window.scrollY;

    // Fades content as you scroll down
    heroContent.style.opacity = 1 - (scrollPos / 500);
});
