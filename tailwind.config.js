/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        //primary: 'rgb(var(--color-primary) / <alpha-value>)',
        'primary': 'hsl(356, 92%, 46%)',
        //'primary-light': 'hsl(356, 92%, 85%)',
      },
    },
    fontFamily: {
      sans: ['IBM Plex Sans', 'sans-serif'],
    },
    // container: {
    //   center: true,
    //   padding: '2rem',
    // },
    screens: {
      'sm': '576px',
      'md': '768px',
      'lg': '992px',
      'xl': '1200px',
      '2xl': '1400px',
    }
  },
  corePlugins: {
    container: false
  },
  plugins: [
    require('@tailwindcss/typography'),
    function ({ addComponents }) {
      addComponents({
        '.container': {
          maxWidth: '100%',
          marginLeft: 'auto',
          marginRight: 'auto',
          paddingLeft: '2rem',
          paddingRight: '2rem',
          '@screen sm': {
            maxWidth: `${540 - 24 + 64}px`,
          },
          '@screen md': {
            maxWidth: `${720 - 24 + 64}px`,
          },
          '@screen lg': {
            maxWidth: `${960 - 24 + 64}px`,
          },
          '@screen xl': {
            maxWidth: `${1140 - 24 + 64}px`,
          },
          '@screen 2xl': {
            maxWidth: `${1320 - 24 + 64}px`,
          },
        }
      })
    }
  ]
}