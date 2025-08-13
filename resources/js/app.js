import './bootstrap';
import Alpine from 'alpinejs';

if (!window.Alpine || !window.Alpine.version) {
  window.Alpine = Alpine;
  Alpine.start();
}
