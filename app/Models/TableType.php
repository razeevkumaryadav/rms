<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;

class TableType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];
    protected $hidden = ['created_at','updated_at'];

    public function tableitems()
    {
       return $this->hasMany(Table::class,'table_type_id'); 
    }
}
