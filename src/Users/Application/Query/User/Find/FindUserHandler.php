<?php
declare(strict_types=1);

namespace App\Users\Application\Query\User\Find;

use App\Users\Domain\Model\User\User;
use App\Users\Domain\Service\User\UserFinder;

final class FindUserHandler
{
    private UserFinder $userFinder;

    public function __construct(UserFinder $userFinder)
    {
        $this->userFinder = $userFinder;
    }
    
    public function handle(FindUserQuery $query): User
    {
        return $this->userFinder->execute($query->id());
    }
}
