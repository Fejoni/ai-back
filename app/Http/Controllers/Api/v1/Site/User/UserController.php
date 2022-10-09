<?php

namespace App\Http\Controllers\Api\v1\Site\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\User\FindUserRequest;
use App\Wttp\Resources\Site\User\UserResource;
use App\Services\User\UserService;


class UserController extends Controller
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

    /**
     * Получить данные определенного пользователя | Контроллер
     *
     * @param $id
     * @return UserResource
     */
    public function getDataUser($id)
    {
        return $this->userService->getDataUser($id);
    }


    /**
     * Получить все данные пользователей | Контроллер
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getFullDataUser()
    {
        return $this->userService->getFullDataUser();
    }

}
