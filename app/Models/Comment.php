<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'comments';

    public static function getUserName($id)
    {
        $user = User::where("id",$id)->first();
        return $user->name;
    }
}
