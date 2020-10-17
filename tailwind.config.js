module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/sass/**/*.scss',
        './resources/js/**/*.js',
    ],
    theme: {
        container: {
            center: true
        },
        extend: {
            screens: {
                print: { raw: "print" }
            }
        }
    },
    variants: {},
    plugins: [
        require('@tailwindcss/ui'),
        require('@tailwindcss/typography'),
    ]
};
