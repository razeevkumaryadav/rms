<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveOrder extends Model
{
    use HasFactory;
    protected $fillable = ['category_menu_id','sub_category_menu_id','quantity','table_id','user_id'];
    protected $hidden = ['created_at','updated_at'];
}
