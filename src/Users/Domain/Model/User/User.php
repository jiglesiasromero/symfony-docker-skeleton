<?php
declare(strict_types=1);

namespace App\Users\Domain\Model\User;

use Ramsey\Uuid\Uuid;

final class User implements \JsonSerializable
{
    private string $id;
    private string $name;

    private function __construct(string $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(string $name): self
    {
        return new self(Uuid::uuid4()->toString(), $name);
    }

    public static function from(string $id, string $name): self
    {
        return new self($id, $name);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
