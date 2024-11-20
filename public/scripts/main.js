window.addEventListener('load', function() {
    // Когда все ресурсы (включая изображения) загружены, скрыть preloader
    const preloader = document.getElementById('preloader');
    const content = document.getElementById('content');

    // Скрыть preloader
    preloader.style.display = 'none';

    // Показать контент страницы
    content.style.display = 'block';
});

document.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('header ul li a');
    let scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

    sections.forEach((section, index) => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        // Проверка, находится ли секция в области видимости
        if (scrollPosition >= sectionTop - sectionHeight / 3 && scrollPosition < sectionTop + sectionHeight - sectionHeight / 3) {
            navLinks.forEach(link => link.classList.remove('active')); // Убираем активный класс у всех
            navLinks[index].classList.add('active'); // Добавляем активный класс текущему пункту
        }
    });

    // Проверка для последней секции
    const lastSection = sections[sections.length - 1];
    if (scrollPosition + window.innerHeight >= document.body.scrollHeight) {
        navLinks.forEach(link => link.classList.remove('active'));
        navLinks[sections.length - 1].classList.add('active');
    }
});

// Проверка высоты страницы перед инициализацией
if (document.body.scrollHeight > window.innerHeight) {
    // Здесь может быть ваш код инициализации, если нужно
}
