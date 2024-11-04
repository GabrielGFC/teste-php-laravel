<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'file_path',
    ];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
