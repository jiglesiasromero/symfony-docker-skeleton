<?php
declare(strict_types=1);

namespace App\Users\Domain\Model\User;

interface UserRepository
{
    public function find(string $id): ?User;
}
