
import Alpine from 'alpinejs';
import { Notyf } from 'notyf';
import 'notyf/notyf.min.css';

window.Alpine = Alpine;
window.Notyf = Notyf;

Alpine.start();


// Global scroll reveal logic
document.addEventListener('DOMContentLoaded', () => {
  try {
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, observerOptions);

    // Hide elements initially and then observe them
    document.querySelectorAll('.scroll-fade-in, .reveal-on-scroll').forEach(el => {
      el.classList.add('js-hidden');
      observer.observe(el);
    });
  } catch (e) {
    // no-op in unsupported environments
  }
});


