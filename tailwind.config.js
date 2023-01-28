const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/views/**/*.blade.php",
    ],

    darkMode: 'media',

    future: {
        hoverOnlyWhenSupported: true,
    },

    theme: {
        container: {
            center: true,
            padding: '1rem',
        },

        extend: {
            fontFamily: {
                sans: ['Outfit', ...defaultTheme.fontFamily.sans],
                serif: ['Roboto Slab', ...defaultTheme.fontFamily.serif],
            },
        },

        screens: {
            xs: '480px',
            sm: '568px',
            md: '768px',
            lg: '1024px',
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/typography'),
    ],
}
