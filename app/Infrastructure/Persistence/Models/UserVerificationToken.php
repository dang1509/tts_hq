<?php 

namespace App\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class UserVerificationToken extends Model{
    protected $fillable = ['user_id', 'token'];
    public $timestamps = true;
}