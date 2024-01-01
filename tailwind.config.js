/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        fontFamily: {
            backend: ["Montserrat", "Arial", "sans-serif"],
            serif: ["Georgia", "Times", "serif"],
        },
    },
    plugins: [],
};
