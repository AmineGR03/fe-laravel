<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['categorie', 'name', 'info', 'pic', 'price','highlight','highlight_note'];

    public function toArray()
    {
        $array = parent::toArray();

        
        $array['pic'] = str_replace('public/', '', $array['pic']);

        return $array;
    }
}