/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        background: '#22262a',
        card: '#2a2e33',
        text: '#f4f9ff',
        muted: '#7f8389',
        accent: '#59C378',
        dark: '#0f1318',
      },
    },
  }
};
