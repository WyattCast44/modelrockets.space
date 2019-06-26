const purgecss = require("@fullhuman/postcss-purgecss")({
    // Specify the paths to all of the template files in your project
    content: [
        "./resource/views/**/*.html",
        "./resource/views/**/*.blade.php",
        "./resource/views/**/*.blade",
        "./resource/views/**/*.blade.md",
        "./resource/views/**/*.md",
        "./resource/js/controller/**/*.js",
        "./resource/js/**/*.vue"
    ],

    // Specifiy what css files to check against
    css: ["./public/css/**/*.css"],

    // Include any special characters you're using in this regular expression
    defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || []
});

module.exports = {
    plugins: [
        require("tailwindcss"),
        require("autoprefixer"),
        ...(process.env.NODE_ENV === "production" ? [purgecss] : [])
    ]
};
