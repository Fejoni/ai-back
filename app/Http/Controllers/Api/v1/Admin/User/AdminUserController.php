<?php

namespace App\Http\Controllers\Api\v1\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\FindUserRequest;
use App\Http\Resources\Site\User\UserResource;
use App\Services\Admin\User\FindUserService;



class AdminUserController extends Controller
{

    private FindUserService $findUserService;

    public function __construct(FindUserService $findUserService)
    {
        $this->findUserService = $findUserService;
    }

    /**
     * @param FindUserRequest $request
     * @return UserResource
     *
     * Поиск пользователя по имени | Контроллер
     */
    public function findUserByName(FindUserRequest $request)
    {
        $user = $this->findUserService->findUserByName($request->validated());

        return UserResource::make($user);
    }
}
