document.addEventListener('alpine:init', () => {
    Alpine.data('nav', () => {
        // let body = document.getElementById("body");
        let nav = document.getElementById("nav-header");
        return {
            open: false,
            openForm: false,
            buttonDisabled: false,
            formSubmited: false,
            openBurger: false,
            skillsFlag: false,
            
            toggleActive() {
                let location = window.location.pathname;
                let navP = document.querySelectorAll('.menu-translate-p');
                navP.forEach(element => {
                    if (location.includes(element.dataset.active)) {
                        element.classList.add('active');
                    }
                });
            },

            toggleNav() {
                this.open = !this.open;
                this.openBurger = !this.openBurger
                this.buttonDisabled = true;
                if (this.skillsFlag) this.skillsFlag = false;
                if (!this.open) this.openForm = false;
                window.dispatchEvent(new CustomEvent('nav-toggled', { detail: { 'state': this.open }, bubbles: true }))
                setTimeout(() => {this.buttonDisabled = false}, 2000)
            },

            toggleForm() {
                this.openForm = !this.openForm;
            },

            init() {
                setTimeout(() => {
                    let nav = document.querySelector('#nav-list')
                    nav.style.visibility = "visible";
                }, 1000)
                this.toggleActive();
            },

            setNavHeight() {
                if (window.innerWidth < 800) {
                    let setHeroHeight = () => {
                        let vh = window.innerHeight + 'px'; 
                        let hero = document.querySelector('.st-video-container');
                        
                        hero.style.height = `calc(${vh} - 19rem)`;
                    }
            
                    window.addEventListener('load', setHeroHeight);
                    window.addEventListener('resize', setHeroHeight, { passive: true });
                }
            }
        }
    });
});

document.addEventListener('alpine:init', () => {
    Alpine.data('showWindow', () => {
        return {
            open: false,
    		get isOpen() {
      			return this.open;
    		},
    		toggle() {
      			this.open = !this.open;
    		}
        }
    });

});