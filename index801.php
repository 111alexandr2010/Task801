<?php
/**
 * Задаем "namespace" в каждом файле с классами "Worker","Builder" и "Teacher"
 * из папки "Classes801" и воспользуемся автозагрузчиком из "autoload.php" для загрузки
 * вышеупомянутых файлов.
 */
require_once __DIR__ . '/autoload.php';
/**Используем конструкцию " use",
 * чтобы при создании объектов не использовать
 * полное имя класса.
 */
use Classes801\Builder;
use Classes801\Teacher;

/**
 * Создаем по два объекта каждого из классов "Builder" и "Teacher",
 * устанавливаем им значения и выводим для каждого объекта зарплату.
 */
$builder1 = new Builder('Петр', 1500);
$builder1->setSpentDayQuantity(22);
echo 'У строителя ' . $builder1->name . ' ';
if ($builder1->spentDayQuantity > 0) {
    echo ' начислена зарплата: ';
}
echo $builder1->calculateSalary() . '<br >';
echo '<br >';

$builder2 = new Builder('Иван', 1800);
$builder2->setSpentDayQuantity(0);
echo 'У строителя ' . $builder2->name . ' ';
if ($builder2->spentDayQuantity > 0) {
    echo ' начислена зарплата: ';
}
echo $builder2->calculateSalary() . '<br >';
echo '<br >';

$teacher1 = new Teacher('Валентина', 1000, 4);
$teacher1->setSpentDayQuantity(28);
echo 'У учителя ' . $teacher1->name . ' ';
if ($teacher1->spentDayQuantity > 0) {
    echo ' начислена надбавка за стаж : ' . $teacher1->getPremium() . ', ' . ' <br>' .
        ' надбавка за переработку: ' . $teacher1->getConversion() . ', ' . ' <br>' .
        ' получилась итоговая зарплата: ';
}
    echo $teacher1->calculateSalary() . '<br >';
echo '<br >';

$teacher2 = new Teacher('Маргарита', 1100, 6);
$teacher2->setSpentDayQuantity(32);
echo 'У учителя ' . $teacher2->name . ' ';
if ($teacher2->spentDayQuantity > 0) {
    echo ' начислена надбавка за стаж : ' . $teacher2->getPremium() . ', ' . ' <br>' .
        ' надбавка за переработку: ' . $teacher2->getConversion() . ', ' . ' <br>' .
        ' получилась итоговая зарплата: ';
}
    echo $teacher2->calculateSalary()  . '<br >';
echo '<br >';