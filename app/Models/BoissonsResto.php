<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoissonsResto extends Model
{
    //
    protected $fillable = ['nom', 'prix', 'categorie', 'type', 'image', 'thumbnail'];
}
