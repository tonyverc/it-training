import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['input'];

  connect() {
    this.renderStars();
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
      container.appendChild(star);
    }

    this.element.appendChild(container);
  }

  selectStar(value) {
    this.inputTarget.value = value;
    this.updateStars(value);
  }

  updateStars(value) {
    this.element.querySelectorAll('.star').forEach((star, index) => {
      star.textContent = index < value ? '★' : '☆';
    });
  }
}
