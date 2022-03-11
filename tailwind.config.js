module.exports = {
    content: [
        'resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
            center: true,
            padding: '1rem',
        },

        extend: {},

        screens: {
            xs: '480px',
            sm: '568px',
            md: '768px',
        },
    },

    plugins: [
        require('@tailwindcss/forms')
    ],
}
