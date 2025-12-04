<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    //
    protected $fillable = ['nom', 'prix', 'categorie', 'image'];
}
