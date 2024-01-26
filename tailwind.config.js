/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ["./public/**/*.{html,php}","./app/**/**/**/*.{html,js,php}", './public/preline/dist/*.js'],
  theme: {
    extend: {},
  },
  plugins: [ require('preline/plugin')],
}

