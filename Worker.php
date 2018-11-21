<?php

namespace Classes801;
/**
 * Создаем класс "Worker" и задаем ему 3 свойства
 *   - имя($name),
 *   - уровень зарплаты в день ($salaryPerDay),
 *   - количество отработанных дней ($spentDayQuantity).
 * Создаем конструктор с 2-мя первыми свойствами, т.к.
 * при создании нового объекта 3-е свойство (количество отработанных дней) может быть неизвестно.
 */

class Worker
{
    public $name;
    public $salaryPerDay;
    public $spentDayQuantity;

    public function __construct(string $name, int $salaryPerDay)
    {
        $this->name = $name;
        $this->salaryPerDay = $salaryPerDay;
    }

/**Для задания значения количества отработанных дней в виде целого числа (int)создаем метод "setSpentDayQuantity()",
 * а для его возвращения  и проверки на равенство нулю создаем метод "getSpentDayQuantity()", в случае равенство
 * нулю генерируется исключение в виде сообщения "не указано количество рабочих  дней!".
 */

    public function setSpentDayQuantity(int $spentDayQuantity): void
    {
        $this->spentDayQuantity = $spentDayQuantity;
    }
    public function getSpentDayQuantity(): int
    {
        if ($this->spentDayQuantity == 0) {
            throw new \Exception('не указано количество рабочих дней!');
        }
        return $this->spentDayQuantity;
    }

    /**
     * Для расчета суммы зарплаты работника создаем метод "calculateSalary()",
     * который возвращает результат, перемножая уровень зарплаты в днень и количество отработанных дней,
     * полученных из метода "getSpentDayQuantity()".
     * Для случая, когда количество отработанных дней равно нулю, используем метод "try-catch", который
     * в этом случае возвращает текст сообщения об ошибке из исключения.
     */

    public function calculateSalary()
    {
        try {
            return $this->salaryPerDay * $this->getSpentDayQuantity();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}