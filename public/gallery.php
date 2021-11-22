<?php
    require_once '../config/config.php';
    // Отображение шаболона галереи
    echo render(TEMPLATES_DIR . 'gallery.tpl', [
        'title'     => 'Животные',
        'h4'        => 'Мои любимые животные',
        'content'   => 'Фото-галерея животных:'
    ]);
    // Отображение галереи
    photoRendering(IMG_DIR, 3);