const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./app/**/*.php",
        "./resources/svg/**/*.svg",
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
                handwriting: ['Indie Flower', ...defaultTheme.fontFamily.sans],
            },

            typography: {
                DEFAULT: {
                    css: {
                        'h1, h2, h3, h4, h5, h6': {
                            'a:not([href^=http])': {
                                'color': colors.inherit,
                                'font-weight': defaultTheme.fontWeight.bold,
                                'text-decoration': 'none',
                                '&::before': {
                                    'content': '"# "',
                                    'font-weight': defaultTheme.fontWeight.normal,
                                    'opacity': defaultTheme.opacity[50],
                                },
                            },
                        },
                        'a': {
                            'font-weight': 'inherit',
                        },
                        'iframe[src^="https://www.youtube.com"]': {
                            'width': '100% !important',
                            'height': 'auto !important',
                            'aspect-ratio': defaultTheme.aspectRatio.video,
                            'border-radius': defaultTheme.borderRadius.md,
                            'box-shadow': defaultTheme.boxShadow.lg,
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
