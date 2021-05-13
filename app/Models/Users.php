<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    public $table="registration_tbl";
    public $table1="bloodgroup_tbl";
    public $timestamps=false;
}
