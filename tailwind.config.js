module.exports = {
  mode: 'jit',
  purge: [
    './public/admin/partials/**/*.php',
    './public/admin/**/*.php',
    './public/partials-front/**/*.php',
    './public/**/*.php'
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
