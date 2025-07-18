// stars_controller.js
import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
  static targets = ["group", "input"];

  connect() {
    this.groupTargets.forEach((group, index) => {
      const input = this.inputTargets[index];
      const value = parseInt(input.value || 0);
      this.updateStars(group, value);
    });
  }

  selectStar(event) {
    const star = event.currentTarget;
    const value = parseInt(star.dataset.starsValue);
    const group = star.closest("[data-stars-target='group']");
    const index = this.groupTargets.indexOf(group);
    const input = this.inputTargets[index];

    input.value = value;
    this.updateStars(group, value);
  }

  updateStars(group, value) {
    const stars = group.querySelectorAll(".star");
    stars.forEach((star, index) => {
      star.textContent = index < value ? "★" : "☆";
      star.classList.toggle("text-yellow-400", index < value);
      star.classList.toggle("text-gray-300", index >= value);
    });
  }
}
