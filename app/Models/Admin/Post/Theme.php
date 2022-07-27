<?php

namespace App\Models\Admin\Post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public $timestamps = false;

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }
}
