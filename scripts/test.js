// Nav-bar Stuff ---------------------------------------------------------------
const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-bar');
    const navItems = document.querySelectorAll('.nav-item');

    //Nav On-Click Functionality
    burger.addEventListener('click', () => {
        //Toggle Nav
        nav.classList.toggle('nav-active');

        //Animate Links
        navItems.forEach((item, index) => {
            if (item.style.animation) {
                item.style.animation = '';
            }
            else {
                item.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.5}s`;
            }
        });

        //burger toggle
        burger.classList.toggle('active');
    });
};

const navSlide2 = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-bar');
    const navLinks = document.querySelectorAll('.nav-links');

    for(let i=0; i<navLinks.length; i++) {
        navLinks[i].addEventListener('click', () => {

            //Toggle Nav
            nav.classList.toggle('nav-active');

            //burger toggle
            burger.classList.toggle('active');
        });
    }
};

// Fade-in animation for Home-Content -------------------------------------------------
const faders = document.querySelectorAll('.fade-in');

const appearOnScroll  = new IntersectionObserver(function(entries,
                                                          appearOnScroll) {
    entries.forEach(entry => {
        if (!entry.isIntersecting){
            return;
        } else {
            //entry.target.classList.add('appear');
            faders.forEach((fader, index) => {
                fader.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.5}s`;
            });
            appearOnScroll.unobserve(entry.target);
        }
    });
});

faders.forEach(fader => {appearOnScroll.observe(fader);});

// Fade-in Animation for Tiles --------------------------------------------------------
const faders2 = document.querySelectorAll('.fade-in2');

const appearOptions =  {threshold: 1,
    rootMargin: "0px 0px -50px 0px"};

const appearOnScroll2  = new IntersectionObserver(function(entries,
                                                           appearOnScroll) {
    entries.forEach(entry => {
        if (!entry.isIntersecting){
            return;
        } else {
            faders2.forEach((fader, index) => {
                fader.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.5}s`;
            });
            appearOnScroll.unobserve(entry.target);
        }
    }, appearOptions);
}, appearOptions);

faders2.forEach(fader => {appearOnScroll2.observe(fader);});

// Adding Tile Event Listeners & Overlay Animation -------------------------------------
const tile = document.querySelectorAll('.tile');
const para = document.querySelectorAll('.tile-para');
const over = document.querySelectorAll('.tile-overlay');

//Looping tiles to add event listeners and animations
for(let i=0;i<tile.length;i++){
    tile[i].addEventListener('mouseenter', () => {
        para[i].style.animation = `paraFadeIn 0.5s ease forwards`;
        over[i].style.animation = `overlayFadeIn 0.5s ease forwards`;
    });
    tile[i].addEventListener('mouseleave', () => {
        para[i].style.animation = `paraFadeOut 0.5s ease forwards`;
        over[i].style.animation = `overlayFadeOut 0.5s ease forwards`;
    });
}

// Adding Event Listeners for FAQ Accordion -------------------------------------
const accordions = document.getElementsByClassName("faq-question");

for (let i = 0; i < accordions.length; i++) {
    accordions[i].onclick = function() {
        this.classList.toggle('is-open');

        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
            // accordion is currently open, so close it
            content.style.maxHeight = null;
        } else {
            // accordion is currently closed, so open it
            content.style.maxHeight = content.scrollHeight + "px";
        }
    }
}

function popHide() {
    const popCon = document.getElementById('pop-confirmation');
    popCon.style.display = 'none';
}

navSlide();
navSlide2();





