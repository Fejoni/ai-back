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

    public function createContactUser(UserContactRequest $request)
    {
        return $this->userContactService->createContactUser($request->validated());
    }

    public function deleteContactUser()
    {

    }

    public function updateContactUser()
    {

    }

    public function getContactUser()
    {

    }
}
