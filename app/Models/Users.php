<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
    use HasFactory;

    protected $table = "users";

    protected $primaryKey = "id";

    protected $fillable = [
        'id_role',
        'name',
        'email',
        'password',
        'phone_num',
        'approve_status',
        'active_status'
    ];
}
