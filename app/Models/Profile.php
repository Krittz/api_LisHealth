<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Profile extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'profiles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'height',
        'weight',
        'blood',
        'birth',
        'rg',
        'cpf',
        'user_id',
    ];
    protected $casts = [
        'height' => 'float',
        'weight' => 'float',
        'birth' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
