<?php
declare(strict_types=1);

namespace App\Users\Infrastructure\Domain\Model\User;

use App\System\Infrastructure\DbalRepository;
use App\Users\Domain\Model\User\User;
use App\Users\Domain\Model\User\UserRepository;
use Doctrine\DBAL\FetchMode;

final class DbalUserRepository extends DbalRepository implements UserRepository
{
    private CONST USER_TABLE = 'app_db.user';


    public function find(string $id): ?User
    {
        $stmt = $this->connection()->prepare("
            SELECT
                user.id AS id,
                user.name AS name
            FROM app_db.user AS user
            WHERE user.id = :id;
        ");

        $stmt->bindValue('id', $id);
        $stmt->execute();

        if (0 === $stmt->rowCount()) {
            return null;
        }

        $user = $stmt->fetch(FetchMode::ASSOCIATIVE);

        return $this->mapUser($user);
    }

    private function mapUser($user): User
    {
        return User::from($user['id'], $user['name']);
    }
}
