const colors = require("tailwindcss/colors");

module.exports = {
    content: require("fast-glob").sync(
        [
            "resources/js/**/*.js",
            "resources/js/**/*.vue",
            "resources/js/**/**/*.vue",
            "resources/sass/*.scss",
            "resources/sass/**/*.scss",
            "*.php",
            "./*.php",
            "./**/*.php",
            "./**/**/*.php",
            "./template-part/components/*.php",
            "./template-part/components/basic/*.php",
            "./template-part/components/sections/*.php",
        ],
        { dot: true }
    ),
    theme: {
        fontFamily: {
            body: ["Inter", "sans-serif"],
            default: "Inter",
            raleway: ["Raleway", "Inter", "sans-serif"],
            poppins: ["Poppins", "Inter", "sans-serif"],
            helvetica: ["Helvetica Now Display"],
            'source-serif': ["SourceSerif4", "Source Serif"]
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "24px",
                lg: "0px",
                xl: "120px",
                '2xl':'120px',
            },
            screens:{
                lg:'1024px',
                xl:'1440px',
                '2xl':'1440px',
            }
        },
        extend: {
            screens: {
                'md': '640px',
                'lg': '1024px',
                'xl': '1440px',
                '2xl': '1920px',
            },
            minHeight:{
                '820': '820px'
            },
            maxWidth: {
                '1920': '1920px',
                '1440': '1440px',
            },
            colors: {
                primary: "#0F39A6",
                secondary: "#FEC33C",
                gray: "#D3D4D8",
                active: "#0F39A6",
                success: "#388048",
                error: "#DF1933",
                black: "#020B1F",
                default: "#363062",
                white: "#FFFFFF",
                disablecolor:'#D3D4D8',
                "special-brand-colors" : {
                    blue: '#0F39A6'
                }
            }
        },
    },
    variants: {},
    plugins: [
        require("@tailwindcss/line-clamp"),
        require("@tailwindcss/forms")
    ],
};
