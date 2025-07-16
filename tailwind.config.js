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
        card: '#272b2e',
        text: '#c4cfde',
        muted: '#7f8389',
        accent: '#f8a27e',
        acttive: '#59C378',
        dark: '#0f1318',
      },
      backgroundImage: {
        'background': 'linear-gradient(145deg, #1e2024, #23272b)',
      },
    },
  },
};
