module.exports = {
  content: ["./**/*.php", "./**/**/*.php", "./**/*.css"],
  theme: {
    extend: {
      colors: {
        brand: {},
      },
      fontFamily: {
        sans: ["Lato", "sans-serif"],
      },
      screens: {
        "2xl": "1600px",
        "3xl": "1921px",
      },
      spacing: {
        "1/12": "8.333333%",
        "5/12": "41.666667%",
        "7/12": "58.333333%",
        "11/12": "91.666667%",
      },
      width: {
        "1/12": "8.333333%",
        "5/12": "41.666667%",
        "7/12": "58.333333%",
        "11/12": "91.666667%",
      },
      zIndex: {
        1: "1",
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
