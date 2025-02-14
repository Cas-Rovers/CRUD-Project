import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            const button = e.target.querySelector('button[type="submit"]');
            button.disabled = true;
        });
    });
});
