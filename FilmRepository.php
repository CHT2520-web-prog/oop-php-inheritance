<?php

class FilmRepository {
    private ?PDO $conn;
    function __construct(string $host, string $dbname, string $user, string $pass)
    {
        $this->conn = new PDO("mysql:host={$host};dbname={$dbname}", "{$user}", "{$pass}");
    }

    public function all(): array {
        $stmt = $this->conn->query("SELECT id, title, year, duration FROM films;");
        $films = $stmt->fetchAll(PDO::FETCH_CLASS, Film::class);
        return $films;
    }

    public function find(int $id): ?Film {
        $stmt = $this->conn->prepare("SELECT id, title, year, duration FROM films WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $film =  $stmt->fetchObject(Film::class);
        return $film;
    }

    public function save(Film $film): bool {
        $query = "INSERT INTO films (id, title, year, duration) VALUES (NULL, :title, :year, :duration)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':title', $film->title);
        $stmt->bindValue(':year', $film->year);
        $stmt->bindValue(':duration', $film->duration);
        return $stmt->execute();
    }

    public function update(Film $film): bool {
        // Add your code in here
    }

    public function delete(int $id): bool {
        // Add your code in here
    }
}
