/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        text: {
          light: {
            50: '#f9f8eb',
            100: '#f3f1d8',
            200: '#e7e3b1',
            300: '#dbd68a',
            400: '#cfc863',
            500: '#c3ba3c',
            600: '#9c9530',
            700: '#757024',
            800: '#4e4a18',
            900: '#27250c',
            950: '#141306',
          },
          dark: {
            50: '#141306',
            100: '#27250c',
            200: '#4e4a18',
            300: '#757024',
            400: '#9c9530',
            500: '#c3ba3c',
            600: '#cfc863',
            700: '#dbd68a',
            800: '#e7e3b1',
            900: '#f3f1d8',
            950: '#f9f8eb',
          },
        },
        background: {
          light: {
            50: '#f8f7ec',
            100: '#f1f0da',
            200: '#e3e0b5',
            300: '#d6d18f',
            400: '#c8c26a',
            500: '#bab245',
            600: '#958f37',
            700: '#706b29',
            800: '#4a471c',
            900: '#25240e',
            950: '#131207',
          },
          dark: {
            50: '#131207',
            100: '#25240e',
            200: '#4a471c',
            300: '#706b29',
            400: '#958f37',
            500: '#bab245',
            600: '#c8c26a',
            700: '#d6d18f',
            800: '#e3e0b5',
            900: '#f1f0da',
            950: '#f8f7ec',
          },
        },
        primary: {
          light: {
            50: '#f6f9ec',
            100: '#edf2d9',
            200: '#dae6b3',
            300: '#c8d98c',
            400: '#b6cc66',
            500: '#a4bf40',
            600: '#839933',
            700: '#627326',
            800: '#414d19',
            900: '#21260d',
            950: '#101306',
          },
          dark: {
            50: '#101306',
            100: '#21260d',
            200: '#414d19',
            300: '#627326',
            400: '#839933',
            500: '#a4bf40',
            600: '#b6cc66',
            700: '#c8d98c',
            800: '#dae6b3',
            900: '#edf2d9',
            950: '#f6f9ec',
          },
        },
        secondary: {
          light: {
            50: '#fbf8e9',
            100: '#f8f1d3',
            200: '#f1e3a7',
            300: '#ead57b',
            400: '#e2c850',
            500: '#dbba24',
            600: '#af951d',
            700: '#846f15',
            800: '#584a0e',
            900: '#2c2507',
            950: '#161304',
          },
          dark: {
            50: '#161304',
            100: '#2c2507',
            200: '#584a0e',
            300: '#846f15',
            400: '#af951d',
            500: '#dbba24',
            600: '#e2c850',
            700: '#ead57b',
            800: '#f1e3a7',
            900: '#f8f1d3',
            950: '#fbf8e9',
          },
        },
        accent: {
          light: {
            50: '#fef9e6',
            100: '#fdf4ce',
            200: '#fce99c',
            300: '#fade6b',
            400: '#f9d339',
            500: '#f7c708',
            600: '#c6a006',
            700: '#947805',
            800: '#635003',
            900: '#312802',
            950: '#191401',
          },
          dark: {
            50: '#191401',
            100: '#312802',
            200: '#635003',
            300: '#947805',
            400: '#c6a006',
            500: '#f7c708',
            600: '#f9d339',
            700: '#fade6b',
            800: '#fce99c',
            900: '#fdf4ce',
            950: '#fef9e6',
          },
        },
        plugins: [],
      }
    }
  }
}
