/** @type {import('tailwindcss').Config} */
export default {
    purge: {
        content: [
            './resources/**/*.blade.php',
            './resources/**/*.js',
            './resources/**/*.vue',
        ],
        options: {
            safelist: ['list-disc', 'list-decimal'],
        },
    },
    theme: {
        extend: {
        },
    },
    plugins: [],
}

