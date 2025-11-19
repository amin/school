<?php

declare(strict_types=1);

class School
{
    private array $programs;
    public function __construct(public string $name) {}
    public function addProgram(Program $program): void
    {
        $this->programs[] = $program;
    }
    public function getPrograms(): array
    {
        return $this->programs;
    }
}
