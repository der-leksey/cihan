/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
    fontFamily: {
      sans: ['Roboto', 'sans-serif'],
    },
    container: {
      center: true,
      padding: '2rem',
    },
  },
  plugins: [],
}