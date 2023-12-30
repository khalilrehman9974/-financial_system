<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoaMainHead extends Model
{
    const PER_PAGE = 10;
    protected $table = 'coa_main_head';
    protected  $guarded = ['id'];
    protected $fillable = ['name'];
}
