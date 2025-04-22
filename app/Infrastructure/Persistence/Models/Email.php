<?php 

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model{

    
    protected $fillable = [
        'to_email',
        'subject',
        'body',
        'type',
        'sent_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}