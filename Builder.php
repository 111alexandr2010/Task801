<?php

namespace Classes801;
/**
 * Создаем класс "Builder", наследуемый из класса "Worker"
 * и внем конструктор с 2-мя свойствами из родительского класса
 */
class Builder extends Worker
{
    public function __construct(string $name, int $salaryPerDay)
    {
        parent::__construct($name, $salaryPerDay);
    }


}