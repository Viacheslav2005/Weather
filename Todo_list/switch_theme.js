const themeToggle = document.getElementById('theme-toggle');
const body = document.body;
const modalContent = document.getElementById('modal-content'); // Добавлено получение элемента 
let isDarkMode = localStorage.getItem('theme') === 'dark' ? true : false;

function toggleTheme() {
 isDarkMode = !isDarkMode;
 updateTheme();
}

function updateTheme() {
 if (isDarkMode) {
 body.classList.remove('light-mode');
 body.classList.add('dark-mode');
 modalContent.classList.remove('light-mode'); // Изменено на classList
 modalContent.classList.add('dark-mode'); // Изменено на classList
 input_note.classList.remove('light-mode');
 input_note.classList.add('dark-mode'); 
 localStorage.setItem('theme', 'dark');
 } else {
 body.classList.remove('dark-mode');
 body.classList.add('light-mode');
 modalContent.classList.remove('dark-mode'); // Изменено на classList
 modalContent.classList.add('light-mode'); // Изменено на classList
 input_note.classList.remove('dark-mode');
 input_note.classList.add('light-mode');  // Изменено на classList
 localStorage.setItem('theme', 'light');
 }
}

themeToggle.addEventListener('click', toggleTheme);

// Инициализация темы при загрузке страницы
if (localStorage.getItem('theme') === null) {
 localStorage.setItem('theme', 'light');
} else {
 updateTheme();
}