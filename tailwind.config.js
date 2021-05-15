const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    purge: [
        "storage/framework/views/**/*.*",
        "resources/views/**/*.*",
        "resources/svg/**/*.svg",
        "resources/js/**/*.*",
        "resources/css/**/*.*",
    ],
    mode: 'jit',
    darkMode: 'class', // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                'cool-gray': colors.coolGray,
            },
            screens: {
                'print': {'raw': 'print'},
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans]
            }
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
}
