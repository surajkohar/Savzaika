import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/* @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    options: {
        safelist: ["hover:text-[#0A58D4]"], // Add your custom classes here.
    },

    theme: {
        extend: {
            gridTemplateRows: {
                "[auto,auto,1fr]": "auto auto 1fr",
            },
            colors: {
              buttonColor0 :"#8E5088",
            //   buttonColor0 :"#22C55E",
                buttonColor1: "#853F8F",
                // buttonColor1: "#16A34A",
                buttonColor2: "#9059BE",
                customColor: "#ff6b6b",
                lightBlue: "#54C4FA",
                lightRed: "#FC8D8C",
                lightGreen: "#62E163",
                lightPurple: "#C89CFF",
                yellow: "#F9D600",
                orange: "#F88F33",
                reddishRed: "#E74C3C",
                pinkishRed: "#FF2D60",
                
            },
        },
    },

    plugins: [forms, typography],
};
