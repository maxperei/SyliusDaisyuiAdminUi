import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ['input', 'menuItem', 'close', 'icon'];

    search(e) {
        const query = e.target.value.toLowerCase();

        this.menuItemTargets.forEach(menuItem => {
            const details = menuItem.querySelector('details');
            const collapseItems = menuItem.querySelectorAll('.collapse-item');
            const text = menuItem.textContent.toLowerCase();
            let matchFound = false;

            collapseItems.forEach(item => {
                const text = item.textContent.toLowerCase();
                if (query === '' || text.includes(query)) {
                    item.classList.remove('hidden');
                    matchFound = true;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (matchFound || text.includes(query) || query === '') {
                menuItem.classList.remove('hidden');
            } else {
                menuItem.classList.add('hidden');
            }

            if (query !== '') {
                this.iconTarget.classList.add('hidden');
                this.closeTarget.classList.remove('hidden');
                if (details) details.setAttribute('open', '');
            } else {
                this.closeTarget.classList.add('hidden');
                this.iconTarget.classList.remove('hidden');
                if (details) details.removeAttribute('open');
            }
        });
    }

    clear() {
        this.inputTarget.value = '';
        this.inputTarget.dispatchEvent(new Event('input'));
    }
}