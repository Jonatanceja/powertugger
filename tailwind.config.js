/** @type {import('tailwindcss').Config} */
module.exports = {
  theme: {
    extend: {}
  },
  variants: {
    extend: {}
  },
  plugins: [
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/aspect-ratio")
  ],
  content: [
    "site/templates/**/*.html",
    "site/templates/**/*.php",
    "resources/**/*.js",
    "resources/**/*.vue"
  ]
};
