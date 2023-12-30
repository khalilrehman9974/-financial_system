<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreIssueNote extends Model
{
    protected $fillable = ['issued_date','issued_no','issued_to','issued_quantity','description','remarks'];

}
