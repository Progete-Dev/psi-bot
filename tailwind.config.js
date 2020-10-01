const pagination = require('tailwindcss-plugins/pagination');

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
  ],
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
        primary: "var(--bg-primary)",
        secondary : "var(--bg-secondary)",
        theme : "var(--bg-theme)",
        button : "var(--bg-button)",
        menu : "var(--bg-menu)",
        "menu-hover" : "var(--bg-menu-hover)",
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

