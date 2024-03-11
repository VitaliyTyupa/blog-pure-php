<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'artic_categ_id_ref',
    'artic_desc',
    'artic_bild',
    'artic_tn_bild'
  ];
}
