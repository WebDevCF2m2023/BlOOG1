<?php

namespace model\Interface;

use PDO;
use Exception;

interface InterfaceManager
{
    public function __construct(PDO $pdo);
    public function selectAll(): array;
    public function selectOneById(int $id): object;
    public function insert(object $object): void;
    public function update(object $object): void;
    public function delete(int $id): void;
}