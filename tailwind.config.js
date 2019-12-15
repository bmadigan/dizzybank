const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans]
            },
      spacing: {
        '72': '18rem',
        '80': '20rem'
      },
      padding: {
        '5/6': '83.333333%'
      }
        }
    },
    variants: {},
  plugins: [
    require('@tailwindcss/custom-forms')
  ]
};
