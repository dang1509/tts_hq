<?php 

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model{

    
    protected $fillable = [
        'email',
        'code',
        'status',
        'expires_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}