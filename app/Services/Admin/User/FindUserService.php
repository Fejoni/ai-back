<?php

namespace App\Services\Admin\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FindUserService
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
}