<?php

declare(strict_types=1);

namespace App\Database;

use PDO;

class QueryBuilder
{
    private string $query;

    public function __construct(
        private PDO $database
    ) {}

    public function select(array $columns = ['*']): static
    {
        $this->query = sprintf('SELECT %s', implode(', ', $columns));
        return $this;
    }

    public function count(): static
    {
        $this->query = sprintf('SELECT count(*)');
        return $this;
    }

    public function from(string $table): static
    {
        $this->query = sprintf('%s FROM %s', $this->query, $table);

        return $this;
    }

    public function limit(int $limit): static
    {
        $this->query = sprintf('%s LIMIT %d', $this->query, $limit);
        return $this;
    }

    public function orderBy(string $table, string $direction): static
    {
        $this->query = sprintf('%s ORDER BY %s %s', $this->query, $table, $direction);
        return $this;
    }

    public function and(string $column, string $operator, string|int $value): static
    {
        $value = is_string($value) ? sprintf("'%s'", $value) : $value;
        $this->query = sprintf('%s AND %s %s %s', $this->query, $column, $operator, $value);

        return $this;
    }

    public function where(string $column, string $operator, string|int $value): static
    {

        $value = is_string($value) ? sprintf("'%s'", $value) : $value;
        $this->query = sprintf('%s WHERE %s %s %s', $this->query, $column, $operator, $value);

        return $this;
    }

    public function first(): object
    {
        $result = $this->limit(1)->get();
        return reset($result);
    }

    public function get(): array
    {
        $statement = $this->database->prepare($this->query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_CLASS);

        return $result ?: [];
    }
}
