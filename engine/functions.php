<?php
    require_once '../config/config.php';
    // Функция вывода шаблона
    /**
    * Функция вывода шаблона
    * @param    $file        string      имя файла-шаблона
    * @param    $variables   array       массив с переменными шаблона
    * @return   string       результат вывода
    */
    function render($file, $variables = [])
    {
    	if (!is_file($file)) {
    		echo 'Файл шаблона "' . $file . '" не найден';
    		exit();
    	}
    	if (filesize($file) === 0) {
    		echo 'Файл шаблона "' . $file . '" пуст';
    		exit();
    	}
    	
    	$templateContent = file_get_contents($file);
    	
    	if (empty($variables)) {
    	    return $templateContent;
        }
        // Просмотрим все переменные, переданные в шаблон
    	foreach ($variables as $varName => $varValue) {
    		if (is_array($varValue)) {
    			continue;
    		}
    		$varName = '{{' . strtoupper($varName) . '}}';
    		$templateContent = str_replace($varName, $varValue, $templateContent);
    	}
    	return $templateContent;
    }
    
    /**
     * Функция вывода фотогалереи
     * @param    $fDir          string      папка с изображениями
     * @param    $fColumns      int         количество колонок в строке
     */
    function photoRendering(
        $fDir = IMG_DIR,    // папка с изображениями
        $fColumns = 3       // количество колонок в строке
    )
    {
        $dir = "$fDir/";            // папка с изображениями
        $columns = $fColumns;       // количество столбцов при создании таблицы
        $files = scandir($dir);     // все изображения из папки
        natsort($files);            // сортируем в привычном для человека порядке
        echo '<table>';             // откроем тег таблицы
        $k = 0;                     // счетчик картинок в строке
        //  Цикл по всем файлам в каталоге
        foreach ($files as $photo) {
            if (($photo !== '.') && ($photo !== '..')) {              // избавляемся от служебных файлов
                if ($k % $columns === 0) {
                    echo '<tr>';                // добавляем новую строку
                }
                echo '<td>';                                        // начинаем столбец
                $path = $dir . $photo;                              // получаем путь к картинке
                echo "<a href=$path target=_blank>";                // делаем ссылку на полноформатную картинку
                echo "<img src=$path alt='Фото' width='100' />";    // вывод превью картинки
                echo '</a>';                                        // Закрываем ссылку
                echo '</td>';                                       // Закрываем столбец
                //переход на следеющею строку при заполнении
                if ((($k + 1) % $columns === 0)) {
                    echo "</tr>";
                }
                // Увеличиваем  счётчик картинок в строке
                $k++;
            }
        }
        echo '</table>';        // закроем тег таблицы
    }