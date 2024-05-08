const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                "image-one": 'url("/images/bg/bgImage1.jpg")',
                "image-two": 'url("/images/bg/bgImage2.jpg")',
                "image-three": 'url("/images/bg/bgImage3.jpg")',
            },
            // backgroundColor: {
            //     "primary": "#254268",
            //     "secondary": "#F15A29"
            // },
            // textColor: {
            //     "primary": "#254268",
            //     "secondary": "#F15A29"
            // },
            colors: {
                "primary": {
                    default: '#254268',
                    50: '#769CCE',
                    100: '#6792C9',
                    200: '#497CBE',
                    300: '#3A68A4',
                    400: '#305586',
                    500: '#254268',
                    600: '#16283F',
                    700: '#080D15',
                    800: '#000000',
                    900: '#000000',
                    950: '#000000'
                },
                "secondary": {
                    default: '#F15A29',
                    50: '#FCDFD5',
                    100: '#FBD0C2',
                    200: '#F9B39C',
                    300: '#F69576',
                    400: '#F4784F',
                    500: '#F15A29',
                    600: '#D43E0E',
                    700: '#9F2F0A',
                    800: '#6B1F07',
                    900: '#361004',
                    950: '#1C0802'
                },
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],

};
