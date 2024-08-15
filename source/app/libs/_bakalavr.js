export function bakalavr() {
    // Находим все ссылки с классом "bakalavr__items-link"
    const links = document.querySelectorAll('.bakalavr__items-link');

    if (links.length > 0) {
        // Проходимся по всем ссылкам и проверяем, заполнен ли атрибут "href"
        links.forEach(link => {
            if (link.getAttribute('href') !== '') {
                // Если атрибут "href" заполнен, добавляем класс "active" к ссылке
                link.classList.add('--active');
            } else {
                // Если атрибут "href" пустой, удаляем класс "active" и отменяем стандартное поведение ссылки
                link.addEventListener('click', e => {
                    e.preventDefault();
                });
            }
        });
    }
}


