<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_login extends Model
{
    use HasFactory;
    protected $table = 'user_login';
    public $timestamps = false;
}
