<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    protected $table = 'bouteille';

    protected $fillable = [
        'title',
        'price',
        'saq_link',
        'saq_code',
        'country',
        'region',
        'degree_alcohol',
        'color',
        'size',

    ];
}
