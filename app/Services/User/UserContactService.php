<?php

namespace App\Services\User;

use App\Http\Resources\Site\User\UserContactResource;
use App\Models\Site\User\UserContact;
use App\Models\User;

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

        return response()->json('success');
    }

    public function updateContactUser($data)
    {
        if (UserContact::where('user_id', $data['user_id'])->doesntExist()) {
            return $this->createContactUser($data);
        }

        UserContact::where('user_id', $data['user_id'])->update([
            'gitOrBit' => $data['gitOrBit'] ?? null,
            'telegram' => $data['telegram'] ?? null,
            'skype' => $data['skype'] ?? null,
            'vk' => $data['vk'] ?? null,
            'discord' => $data['discord'] ?? null,
        ]);

        return response()->json('success');
    }

    public function getContactUser($id)
    {
        if (User::where('id', $id)->exists()){
            $contacts = UserContact::where('user_id', $id)->get();

            return UserContactResource::make($contacts);
        }

        return 'Не удалось получить данные пользователя';
    }
}