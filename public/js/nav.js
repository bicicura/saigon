document.addEventListener('alpine:init', () => {
    Alpine.data('nav', () => {
        let body = document.getElementById("body");
        let nav = document.getElementById("nav-header");
        return {
            open: false,
            openForm: false,
            buttonDisabled: false,
            formSubmited: false,
            openBurger: false,
            
            toggleActive() {
                let location = window.location.pathname;
                let navP = document.querySelectorAll('.menu-translate-p');
                navP.forEach(element => {
                    if (location.includes(element.dataset.active)) {
                        element.classList.add('active');
                    }
                });

                // cambiar esto
                if (document.querySelector('#castings-comerciales') != null) {
                    document.querySelector('.castings-c-p').classList.add('active')
                }
            },

            toggleNav() {
                this.open = !this.open;
                this.buttonDisabled = true;
                if (!this.open) this.openForm = false;
                nav.classList.remove('saigon-bg-black-2');
                this.open? body.classList.add('overflow-hidden') : body.classList.remove('overflow-hidden')
                setTimeout(() => {this.buttonDisabled = false}, 2000)
            },

            toggleForm() {
                this.openForm = !this.openForm;
                nav.classList.add('saigon-bg-black-2');
            },

            init() {
                console.log(Livewire)
                setTimeout(() => {
                    let nav = document.querySelector('#nav-list')
                    nav.style.visibility = "visible";
                }, 1000)
                this.toggleActive();
            },
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