/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
    "./components/**/*.{js,ts,jsx,tsx,css,woff}"
    , './node_modules/tw-elements/dist/js/**/*.js'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      xxsm: '280px',
      // => @media (min-width: 280px) { ... }

      xsm: '360px',
      // => @media (min-width: 360px) { ... }

      msm: '440px',
      // => @media (min-width: 480px) { ... }

      sm: '600px',
      // => @media (min-width: 640px) { ... }

      md: '768px',
      // => @media (min-width: 768px) { ... }

      xmd: '840px',
      // => @media (min-width: 880px) { ... }

      xxmd: '920px',
      // => @media (min-width: 920) { ... }

      lg: '1024px',
      // => @media (min-width: 1024px) { ... }

      xlg: '1120px',
      // => @media (min-width: 1100px) { ... }

      xl: '1220px',
      // => @media (min-width: 1200px) { ... }

      xl1: '1367px',
      // => @media (min-width: 1300) { ... }

      xl2: '1436px',
      // => @media (min-width: 1436px) { ... }
      temp : '1478px',
      temp2 : '1574px',
      lx3: '1600px',
      // => @media (min-width: 1600px) { ... }
    },
    fontFamily: {
      'poppins': ['Poppins']
    },
    colors: {
      'primary': '#723AC6',
      'primary-dark': '#6734B2',
      'gray': '#404F65',
      'white': '#FFFFFF',
      'white-light': '#EEF0F3',
      'primary-light': '#F1EBF9',
      'black': '#2A3342',
      'black-100': '#333F51',
      'gray-light': '#D5DAE1',
      'gray-100': '#8896AB',
      'gray-200': '#556987',
      'gray-300': '#4D5F7A',
      'blue': '#3B82F6',
      'blue-light': '#EBF3FE',
      'success': '#22C55E',
      'warning': '#F59E0B',
      'warning-light': '#FEF5E7',
      'success-light': '#DCFCE7',
      'danger-light': '#FDEEEC',
      'primary-100': '#F1EBF9',
      'success-100': 'rgb(37 197 94 / 8%)',
      'blue-100': 'rgb(59 130 246 / 8%)',
      'warning-100': 'rgb(245 158 11 / 8%)',
      'warning-light': '#FEF7F6',
      'danger': '#EF5944',
    },
    extend: {},
  },
  plugins: [
    // require("daisyui"),
  ],
}
