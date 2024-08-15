export function revLoad() {
    let itemsToShow = 4;
    let items = document.querySelectorAll('.reviews-load__item');
    if (items.length > 0) {
        for (let i = 0; i < itemsToShow; i++) {
            if (items[i]) {
                items[i].style.display = 'block';
            }
        }

        document.querySelector('.reviews-load__btn').addEventListener('click', function () {
            for (let i = 0; i < itemsToShow; i++) {
                let hiddenItems = document.querySelectorAll('.reviews-load__item:not([style*="display: block"])');
                if (hiddenItems[0]) {
                    hiddenItems[0].style.display = 'block';
                }
            }
        });
    }

}