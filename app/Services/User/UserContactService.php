<?php

namespace App\Services\User;

use App\Http\Resources\Site\User\UserContactResource;
use App\Models\Site\User\UserContact;

class UserContactService
{
    public function createContactUser($data)
    {
        $contacts = UserContact::create([
            'user_id' => $data['user_id'],
            'gitOrBit' => $data['gitOrBit'] ?? null,
            'telegram' => $data['telegram'] ?? null,
            'skype' => $data['skype'] ?? null,
            'vk' => $data['vk'] ?? null,
            'discord' => $data['discord'] ?? null,
        ]);

        return UserContactResource::make($contacts);
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