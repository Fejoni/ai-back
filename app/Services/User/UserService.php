<?php

namespace App\Services\User;

use App\Http\Resources\Site\User\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserService
{
    /**
     * @param $data
     * @return Model|Builder|User|null
     *
     * Поиск пользователя по имени | Сервис
     */
    public function findUserByName($data): Model|Builder|User|null
    {
        $user = User::query()->where('name', $data['name'])->first();

        return $user;
    }

    public function getDataUser($id) {

        $user = User::query()->where('id', $id)->first();

        return UserResource::make($user);
    }
}