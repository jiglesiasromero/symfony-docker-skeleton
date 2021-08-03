<?php
declare(strict_types=1);

namespace App\Users\Application\Query\User\Find;

final class FindUserQuery
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}
