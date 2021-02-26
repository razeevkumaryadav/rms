<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;
    protected $fillable=['name','table_type_id','status'];
    protected $hidden=['created_at','updated_at'];

    public function tabletypes()
    {
        return $this->belongsTo(TableType::class,'table_type_id');
    }
}
