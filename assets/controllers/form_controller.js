import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static targets = ['form', 'feedback'];

  submit(event) {
    event.preventDefault();

    const formData = new FormData(this.formTarget);

    fetch(this.formTarget.action, {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest' // important pour détecter isXmlHttpRequest côté Symfony
      }
    })
      .then(response => response.text())
      .then(data => {
        this.feedbackTarget.innerHTML = `
          <div class="alert alert-${data.success ? 'success' : 'danger'} alert-dismissible fade show" role="alert">
            ${data.message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        `;

        if (data.success) {
          this.formTarget.reset();
        }
      })
      .catch(() => {
        this.feedbackTarget.innerHTML = `
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Une erreur est survenue. Veuillez réessayer plus tard.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        `;
      });
  }
}
