<?php

declare(strict_types=1);


class Employee extends Person
{
    public string $title;
    private int $yearlySalary;

    public function setYearlySalary(int $salary): void
    {
        $this->yearlySalary = $salary;
    }

    public function getMonthlySalary()
    {
        return $this->yearlySalary / 12;
    }
}
