const pagination = require('tailwindcss-plugins/pagination');

module.exports = {
  purge: [],
  theme: {
    extend: {
      textColor: {
        primary: "var(--text-primary)",
        secondary :"var(--text-secondary)",
        link: "var(--text-link)",
        button: "var(--text-button)",
        menu : "var(--text-menu)",
      },
      backgroundColor: {
        primary: "var(--bg-color)",
        secondary : "var(--bg-secondary)",
        theme : "var(--bg-theme)",
        button : "var(--bg-button)",
        menu : "var(--bg-menu)",
      },
      screens: {
        dark: { raw: "(prefers-color-scheme: dark)" }
      }
    }
  },
  plugins: [
    pagination
  ]
}

