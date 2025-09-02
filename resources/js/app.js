
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

    document.querySelectorAll('.scroll-fade-in').forEach(el => observer.observe(el));
  } catch (e) {
    // no-op in unsupported environments
  }
});


