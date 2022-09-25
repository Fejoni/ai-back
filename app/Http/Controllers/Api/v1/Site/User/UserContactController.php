<?php

namespace App\Http\Controllers\Api\v1\Site\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\User\UserContactRequest;
use App\Services\User\UserContactService;
use Illuminate\Http\Request;

class UserContactController extends Controller
{

    private UserContactService $userContactService;

    public function __construct(UserContactService $userContactService)
    {
        $this->userContactService = $userContactService;
    }

    /**
     * Создание контактной информации пользователя
     *
     * @param UserContactRequest $request
     * @return \App\Http\Resources\Site\User\UserContactResource
     */
    public function createContactUser(UserContactRequest $request)
    {
        return $this->userContactService->createContactUser($request->validated());
    }

    /**
     * Обновление контактной информации пользователя
     *
     * @param UserContactRequest $request
     * @return \App\Http\Resources\Site\User\UserContactResource|string
     */
    public function updateContactUser(UserContactRequest $request)
    {
        return $this->userContactService->updateContactUser($request->validated());
    }

    /**
     * Получить контактной информацию пользователя
     *
     * @param UserContactRequest $request
     * @return \App\Http\Resources\Site\User\UserContactResource|string
     */
    public function getContactUser($id)
    {
        return $this->userContactService->getContactUser($id);
    }

}
