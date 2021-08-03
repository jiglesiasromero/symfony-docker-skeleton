<?php
declare(strict_types=1);

namespace App\Users\Domain\Service\User;

use App\Users\Domain\Model\User\Exception\UserNotFoundException;
use App\Users\Domain\Model\User\User;
use App\Users\Domain\Model\User\UserRepository;

final class UserFinder
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(string $id): ?User
    {
        $user = $this->userRepository->find($id);

        if (null === $user) {
            throw UserNotFoundException::fromId($id);
        }

        return $user;
    }
}
