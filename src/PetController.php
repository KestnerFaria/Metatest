<?php
declare(strict_types=1);
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/Pet.php';

class PetController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function all(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM pets ORDER BY id");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Pet');
    }

    public function find(int $id): ?Pet
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pets WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pet');
        return $stmt->fetch() ?: null;
    }

    public function create(array $data): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO pets (nome, tutor) VALUES (?, ?)");
        $stmt->execute([$data['nome'], $data['tutor']]);
    }

    public function update(int $id, array $data): void
    {
        $stmt = $this->pdo->prepare(
            "UPDATE pets SET nome = ?, tutor = ? WHERE id = ?"
        );
        $stmt->execute([$data['nome'], $data['tutor'], $id]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM pets WHERE id = ?");
        $stmt->execute([$id]);
    }
}
