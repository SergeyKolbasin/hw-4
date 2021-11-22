<?php
    // Каталоги сайта
    define('SITE_DIR', __DIR__ . '/../');               // Выход на один уровень вверх в структуре каталогов сайта
    define('CONFIG_DIR', SITE_DIR . 'config/');         // Конфигурация
    define('DATA_DIR', SITE_DIR . 'data/');             // Данные
    define('ENGINE_DIR', SITE_DIR . 'engine/');         // Функционал
    define('WWW_DIR', SITE_DIR . 'public/');            // Каталог, доступный посетителям сайта
    define('TEMPLATES_DIR', SITE_DIR . 'templates/');   // Шаблоны
    define('IMG_DIR', 'img/');                          // Изображения
    
    require_once ENGINE_DIR . 'functions.php';          // Подключение функционала
