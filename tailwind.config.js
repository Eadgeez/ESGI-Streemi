const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
  ],
  darkMode: 'class', //false, class, media
  theme: {
    screens:{
      'xs': '350px',
      ...defaultTheme.screens,
    },
    extend: {
      colors: {

      },
      fontFamily: {
        'montserrat': ['Montserrat','sans-serif'],
        'poppins': ['Poppins','sans-serif'],

      },
      fontSize: {
        'xxs': '.65rem'
      },

    }
  },
  plugins: [],
}

