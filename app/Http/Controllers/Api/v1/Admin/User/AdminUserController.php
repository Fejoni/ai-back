<?php

namespace App\Http\Controllers\Api\v1\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\FindUserRequest;
use App\Http\Resources\Site\User\UserResource;
use App\Services\Admin\User\FindUserService;
use App\Services\UserService;
use Illuminate\Http\Request;


class AdminUserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param FindUserRequest $request
     * @return UserResource
     *
     * Поиск пользователя по имени | Контроллер
     */
    public function findUserByName(FindUserRequest $request)
    {
        $user = $this->userService->findUserByName($request->validated());

        return UserResource::make($user);
    }

    public function getDataUser($id)
    {
        return $user = $this->userService->getDataUser($id);
    }
}
