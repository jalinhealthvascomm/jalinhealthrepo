/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
    "./resources/**/**/**/*.blade.php",
    "./resources/**/**/**/**/*.blade.php",
    "./resources/**/**/**/**/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/js/vue/*.vue",
  ],
    theme: {
        container: {
            center: true,
            padding: {
              DEFAULT: '.5rem',
              sm: '2rem',
              lg: '2rem',
              xl: '3rem',
              '2xl': '3rem',
            },
        },

        extend: {
            colors: {
                primary: '#007FFF',
                secondary: '#23B6AE',
                background: '#DAEFFB',
                navy: '#111042',
                'gray-6': '#F2F2F2',
                'gray-4': '#BDBDBD',
                'gray-3': '#828282',
                'gray-2': '#4F4F4F',

            },
        },
    },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp')
  ],
}
