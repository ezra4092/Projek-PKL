<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    public $table = 'passwordresets';
    protected $fillable = ['user_id', 'token', 'created_at', 'update_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
