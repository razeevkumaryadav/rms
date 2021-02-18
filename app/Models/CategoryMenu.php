<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategoryMenu;

class CategoryMenu extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];


    public function SubCategoryMenus()
    {
        return $this->hasMany(SubCategoryMenu::class,'category_menu_id');
    }
}
