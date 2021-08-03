<?php
declare(strict_types=1);

namespace App\Users\Entrypoint\Controller;

use App\Users\Application\Query\User\Find\FindUserQuery;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UserController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function find(Request $request): JsonResponse
    {
        $user = $this->commandBus->handle(new FindUserQuery($request->attributes->get('id')));

        return new JsonResponse($user, Response::HTTP_OK);
    }
}
