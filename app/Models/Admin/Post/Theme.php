<?php

namespace App\Models\Admin\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;


    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    protected $fillable = ['title'];

    public $timestamps = false;


}
