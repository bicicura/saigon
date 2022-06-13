/* 
======================================================
Logo chico aparece cuando el grande se va del viewport
======================================================
*/

// what are we going to be changing
const logoTop = document.querySelector('.home-intro');

// what are we going to be watching
const header = document.querySelector('.header-logo-big');

const vidick = document.querySelector('.vidick')

const sectionOneOptions = {
    rootMargin: "-50px 0px 0px 0px"
};

const sectionOneObserver = new IntersectionObserver
(function(
    entries, 
    sectionOneObserver
) {
    entries.forEach(entry => {
        if (!entry.isIntersecting) {
            logoTop.classList.remove('opacity-0');
            logoTop.classList.add('opacity-100');
            // if (entry.target.classList.contains('header-logo-big')) {
            //     logoTop.classList.add('opacity-100')
            //     setTimeout(() => { vidick.classList.add('hidden') }, 250)
            //     sectionOneObserver.unobserve(header)
            // }
        }
        else {
            logoTop.classList.remove('opacity-100');
            logoTop.classList.add('opacity-0');
        }
    });
}, 
sectionOneOptions);

sectionOneObserver.observe(header)



/* 
====================
ANIMACION LOGO INDEX
====================
*/

const logoLetras = document.querySelectorAll('.logo-letra');
const psIntro = document.querySelectorAll('.intro-p');
const pShort = document.querySelector('.intro-p-short');


window.addEventListener('load', () => {
    logoLetras.forEach((letra) => {
        letra.classList.add('translateY');
    });

    setTimeout( () => {
        psIntro.forEach((p) => {
            p.classList.add('opacity-100', 'translate-x-0');
        });
    
        pShort.classList.add('opacity-100', 'translate-y-0');
    }, 650)

})