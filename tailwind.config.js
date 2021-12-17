const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        yellow: {
          100: '#FEF3C7',
          400: '#FBBF24',
          800: '#92400E',
        },
        green: colors.emerald,
        'light-blue': colors.sky,
        blue: {
          50: '#F3FAFE',
          100: "#E8F5FD",
          200: "#C4E7F9",
          300: "#5CBDF1",
          400: "#5BBAEE",
          500: "#149DE7",
          600: "#128DD0",
          700: "#0F76AD",
          800: "#0C5E8B",
          900: "#0A4D71",
        },
      },
    },
  },
  plugins: [],
}
