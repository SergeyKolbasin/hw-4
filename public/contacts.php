<?php
    require_once '../config/config.php';
    // Отображение шаблона контактов
    echo render(TEMPLATES_DIR . 'contacts.tpl', [
        'title'     => 'Контакты',
        'h4'        => 'Мои контакты:',
        'content'   => 'Пишите мне почаще<br><br>'
    ]);