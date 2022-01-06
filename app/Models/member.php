<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $fillable = ['id_member', 'nama', 'alamat', 'jenis kelamin', 'tlp'];
    protected $hidden = ['created_at', 'updated_at'];
    protected $table = "member";
    protected $primaryKey = 'id_member';
}
