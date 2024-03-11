import './bootstrap.js';

$(document).ready(function () {
    // Функция для удаления класса 'active' со всех элементов меню
    function removeActiveClass() {
        $('#header .nav-link').removeClass('active');
        $('#header .nav-item').removeClass('active');
    }

    // Добавляем обработчик события 'click' для всех ссылок
    $('#header .nav-link').on('click', function () {
        removeActiveClass(); // Удаляем 'active' со всех элементов
        $(this).addClass('active'); // Добавляем 'active' к нажатой ссылке
        $(this).closest('.nav-item').addClass('active'); // Добавляем 'active' к родителю ссылки
    });
});
