module.exports = {
  content: ["./**/*.php", "./**/*.css"],
  theme: {
    extend: {
      aspectRatio: {
        portrait: "5 / 7",
        landscape: "4 / 3",
      },
      colors: {
        paprika: "#BF4427", // Paprika
        "paprika-vivid": "#D8623E", // Paprika Vivid
        forest: "#587A37", // Forest
        "forest-vivid": "#779940", // Forest Vivid
        honey: "#EEA720", // Honey
        "honey-vivid": "#F3BD31", // Honey Vivid
        caramel: "#B67F6C", // Caramel
        "caramel-vivid": "#CFAA9A", // Caramel Vivid
        black: "#1D1E24", // Brand Black
        white: "#FBF9F9", // Brand White
        bread: "#F2DDC7", // Bread
        "bread-vivid": "#F6E9DB", // Bread Vivid
        dark: "#1C1C1C", // Dark
        clay: "#383838", // Clay
      },
      fontFamily: {
        main: ["Montserrat", "Verdana", "sans-serif"],
        sans: ["novecento-sans", "Montserrat", "sans-serif"],
        condensed: [
          "novecento-sans-condensed",
          "novecento-sans",
          "Montserrat",
          "sans-serif;",
        ],
      },
      height: {
        112: "28rem",
        120: "30rem",
        128: "32rem",
      },
      screens: {
        "2xl": "1600px",
        "3xl": "1921px",
      },
      spacing: {
        "1/12": "8.333333%",
        "1/8": "12.5%",
        "1/6": "16.666667%",
        "1/4": "25%",
        "5/12": "41.666667%",
        "1/2": "50%",
        "7/12": "58.333333%",
        "7/8": "87.5%",
        "11/12": "91.666667%",
      },
      width: {
        "1/12": "8.333333%",
        "1/8": "12.5%",
        "1/6": "16.666667%",
        "5/12": "41.666667%",
        "7/12": "58.333333%",
        "7/8": "87.5%",
        "11/12": "91.666667%",
        112: "28rem",
        128: "32rem",
      },
      zIndex: {
        1: "1",
      },
    },
  },
  plugins: [require("@tailwindcss/forms")],
};
