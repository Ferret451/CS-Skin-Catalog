import './bootstrap.js';

const paragraphs = document.querySelectorAll('p, a');

paragraphs.forEach(paragraph => {
    const textContent = paragraph.textContent.trim(); // Получаем текст из элемента и обрезаем пробелы

    if (textContent.match(/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}/g)) {
        paragraph.innerHTML = paragraph.innerHTML.replace(/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/g, '<span style="color: red;">$&</span>');
    }

    if (textContent.match(/(https?|ftp):\/\/[^?]+/gi)) {
        paragraph.innerHTML = paragraph.innerHTML.replace(/(https?|ftp):\/\/[^?]+/gi, '<span style="color: green;">$&</span>');
    }

    if (textContent.match(/\d+(\.\d+)?/g)) {
        paragraph.innerHTML = paragraph.innerHTML.replace(/\b\d+(?:\.\d+)?\b/g, '<span style="color: blue;">$&</span>');
    }
});
