const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Rubik', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                background: "#0f0f0f",
                secondary: "#222222",
                code: "#1e1e1e",
                text: "#ffffff",
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
