import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['input'];

  connect() {
    this.renderStars();

    // remplir les étoiles si une valeur est déjà enregistrée
    const currentValue = parseInt(this.inputTarget.value || 0);
    this.updateStars(currentValue);
  }

  renderStars() {
    const container = document.createElement('div');
    container.classList.add('star-container');

    for (let i = 1; i <= 5; i++) {
      const star = document.createElement('span');
      star.textContent = '☆';
      star.dataset.value = i;
      star.classList.add('star');
      star.addEventListener('click', () => this.selectStar(i));
      star.classList.add('star');
      star.innerHTML = '☆';

      star.addEventListener('click', () => {
        this.inputTarget.value = i;
        this.updateStars(i);
      });

      container.appendChild(star);
    }

    this.element.appendChild(container);
  }

  selectStar(value) {
    this.inputTarget.value = value;
    this.updateStars(value);
  }

  // Met à jour l'affichage des étoiles en fonction de la valeur sélectionnée
  // et ajoute la classe 'star-filled' pour les étoiles remplies
  updateStars(value) {
    const stars = this.element.querySelectorAll('.star');
    stars.forEach((star, index) => {
      if (index < value) {
        star.innerHTML = '★';
        star.classList.add('star-filled');
      } else {
        star.innerHTML = '☆';
        star.classList.remove('star-filled');
      }
    });
  }
}
