<?php
/**
 * Создаем автозагрузчик файлов с классами, находящихся
 * в нашей директории "Classes801"
 */
spl_autoload_register(function($className){
    require_once __DIR__ . '/' .$className . '.php';
});