<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    //
    protected $table = 'admin_menus';
    protected $fillable = ['name', 'link', 'publish', 'order', 'parent_id'];
}
