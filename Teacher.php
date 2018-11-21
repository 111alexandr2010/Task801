<?php

namespace Classes801;
/**
 * Создаем класс "Teacher", наследуемый из класса "Worker",
 * добавляем свойство "стаж"($experience)
 * Создаем конструктор с 2-мя свойствами из родительского класса
 * и свойством "стаж".
 * Задаем три константы:
 * - процент надбавки за переработку (const CONVERSION),
 * - норма отработанных дней (const DAYS_RATE)
 * - процент надбавки за стаж в виде массива с ключом в качестве лет стажа,
 *    со значением в качестве процента надбавки .
 *
 */
class Teacher extends Worker
{
    public $experience;

    const CONVERSION = 0.1;
    const DAYS_RATE = 25;
    const PREMIUM = array(1 => 2, 2 => 4, 3 => 6, 4 => 8, 5 => 10);

    public function __construct(string $name, int $salaryPerDay, int $experience)
    {
        parent::__construct($name, $salaryPerDay);

        $this->experience = $experience;
    }

    /**
     * Создаем метод "getPremium()", который возвращает сумму премии исходя из уровня зарплаты в день,
     * количества отработанных дней и стажа, (предполагаем, что отработавший менее года эту надбавку
     * не получает, а для отработавших 5 лет и более - максимальная надбавка 10%).
     */
    public function getPremium(): int
    {
        $experience = $this->experience;
        if ($experience < 1) {
            return 0;
        } else {
            $experience = ($this->experience > 4) ? 5 : $experience;
            return ($this->salaryPerDay * $this->spentDayQuantity * static::PREMIUM[$experience] / 100);
        }
    }

    /**
     * Создаем метод "getConversion()", возращающий сумму надбавки за переработку из расчета количества
     * отработанных дней, превышашющих норму отработанных дней (const DAYS_RATE), уровня зарплаты в день
     * и процента надбавки(const CONVERSION). Если переработки нет(менее 26 дней), то возвращаем 0.
     */
    public function getConversion()
    {
        if ($this->spentDayQuantity < 26) {
            return 0;
        } else {
            return ($this->spentDayQuantity - self::DAYS_RATE) * $this->salaryPerDay * (1 + self::CONVERSION);
        }

    }

    /**
     * Переопределяем родительский метод " calculateSalary()", добавляя сумму надбавки за стаж
     * и сумму надбавки за переработку.
     */
    public function calculateSalary()
    {
        if ($this->spentDayQuantity != 0){
            return (parent::calculateSalary() + $this->getPremium() + $this->getConversion());
        } else {
            return parent::calculateSalary();
        }
    }
}
