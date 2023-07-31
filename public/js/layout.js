const mobileMenuButton = document.getElementById('mobileMenuButton');
const navLinks = document.getElementById('navLinks');

mobileMenuButton.addEventListener('click', () => {
    if (navLinks.classList.contains('hidden')) {
        navLinks.classList.remove('hidden');
        navLinks.classList.add('flex', 'flex-col', 'items-center', 'w-full', 'mt-4', 'expanded-nav');
    } else {
        navLinks.classList.add('hidden');
        navLinks.classList.remove('flex', 'flex-col', 'items-center', 'w-full', 'mt-4', 'expanded-nav');
    }
});
