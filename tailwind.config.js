/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        gray1: "#F7F9FE",
        gray2: "#ECEFF6",
        strokeGray: "#D7DDEF",
        red: "#EE3147",
        text1: "#5B6C90",
        text2: "#7384AF",
        text3: "#BAC8ED",
        text4: "#485B83",
        text5: "#D8DDE9",
        text6: "#4D5874",
        text7: "#BAC2D7",
        text8: "#121723",
        text9: "#ADADAD",
        text10: "#EBF1FE",
        footer: "#3d4f7a",
        title1: "#112A53",
        orange1: "#FD8721",
        orange2: "rgba(253, 135, 33, 0.05)",
      },
      boxShadow: {
        red1: "0px 10px 7px -8px rgba(238, 49, 71, 0.40)",
        red2: "0px 44px 15px -28px rgba(238, 49, 71, 0.20)",
        blue1: "0px 36px 12px -28px rgba(17, 43, 85, 0.10)",
        blue2: "0px 6px 12px -28px rgba(17, 43, 85, 0.10)",
        blue3: "0px 10px 7px -8px rgba(17, 43, 85, 0.10)",
        footer:
          "var(--tw-ring-offset-shadow,0 0 #0000),var(--tw-ring-shadow,0 0 #0000),var(--tw-shadow)",
      },
      lineHeight: {
        27: "27px",
        26: "26px",
        30: "30px",
        40: "40px",
        45: "45px",
        68: "68px",
      },
      borderRadius: {
        40: "40px",
        30: "30px",
        10: "10px",
        complete: "4.5rem",
      },
      container: {
        center: true,
      },
      fontFamily: {
        bakh: ["bakh", "sans-serif"],
        extra: ["extra", "sans-serif"],
        semibold: ["semibold", "sans-serif"],
      },
      fontSize: {
        22: "22px",
        26: "26px",
        32: "32px",
        42: "42px",
      },
      width: {
        "1px": "1px",
        "5.5/12": "45.83%",
      },
      maxWidth: {
        "2/4": "50%",
      },
      minHeight: {
        60: "60px",
        220: "220px",
        280: "280px",
      },
      maxHeight: {
        "2/4": "50%",
      },
    },
  },
  plugins: [],
};
