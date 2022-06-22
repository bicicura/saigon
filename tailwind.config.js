const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'saigon-black': '#191818',
                'saigon-white': '#F2F2F2',
            },
            spacing: {
                '0.25': '0.0625rem',
                '4.5': '1.1rem',
                '5.5': '1.35rem',
                '26': '6.9rem',
                '104' : '26rem',
              },
            screens: {
                '3xl': '1600px',
            },
            fontSize: {
                'tiny': '0.925rem'
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
    ],
};
