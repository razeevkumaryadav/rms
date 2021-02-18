<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryMenu;

class SubCategoryMenu extends Model
{
    use HasFactory;
    protected $fillable = ['name','unit','price','image','food_type','category_menu_id'];
    protected $hidden = ['created_at','updated_at'];

    public function categorymenus()
    {
        return $this->belongsTo(CategoryMenu::class,'category_menu_id');
    }

}
