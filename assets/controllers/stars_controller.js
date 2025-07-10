import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['input', 'stars'];

  connect() {
    this.updateStars(parseInt(this.inputTarget.value || 0));
  }

  selectStar(event) {
    const value = parseInt(event.currentTarget.dataset.value);
    this.inputTarget.value = value;
    this.updateStars(value);
  }

  updateStars(value) {
    const stars = this.starsTarget.querySelectorAll('.star');
    stars.forEach((star, index) => {
      star.textContent = index < value ? '★' : '☆';
      star.classList.toggle('star-filled', index < value);
    });
  }
}
