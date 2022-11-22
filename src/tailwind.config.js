/** @type {import('tailwindcss').Config} */
module.exports = {
    // purge: [
    //     "./resources/views/**/*.blade.php",
    //     "./resources/js/Pages/**/*.vue",
    // ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                shade_bg: "#4dcb7a",
            },

            padding: {
                xxl: "30px",
            },
            backgroundImage: (theme) => ({
                "landing-intro": "url('/images/back3.jpg')",
            }),
        },
    },
    plugins: [],
};
