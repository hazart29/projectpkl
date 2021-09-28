const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Build your palette here
                transparent: 'transparent',
                current: 'currentColor',
                gray: colors.trueGray,
                red: colors.red,
                blue: colors.sky,
                yellow: colors.amber,
                'purple': {  DEFAULT: '#9F7AEA',  '50': '#FFFFFF',  '100': '#FFFFFF',  '200': '#FEFEFF',  '300': '#DFD2F8',  '400': '#BFA6F1',  '500': '#9F7AEA',  '600': '#7F4EE3',  '700': '#6023DB',  '800': '#4C1CAF',  '900': '#391583'},
              },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
