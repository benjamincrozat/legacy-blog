const colors = require('tailwindcss/colors')
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
            },

            typography: {
                DEFAULT: {
                    css: {
                        'h1, h2, h3, h4, h5, h6': {
                            'a:not([href^=http])': {
                                'color': 'inherit',
                                'font-weight': '700',
                                'text-decoration': 'none',
                                '&::before': {
                                    'content': '"# "',
                                    'font-weight': '400',
                                    'opacity': '.5',
                                },
                            },
                        },
                    },
                },
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
