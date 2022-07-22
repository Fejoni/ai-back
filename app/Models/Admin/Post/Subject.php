<?php

namespace App\Models\Admin\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'theme_id'];

    public $timestamps = false;

}
