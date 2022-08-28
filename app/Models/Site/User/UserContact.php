<?php

namespace App\Models\Site\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'gitOrBit', 'telegram', 'skype', 'vk', 'discord'];

    public $timestamps = false;
}
