<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executer extends Model
{
    use HasFactory;

    protected $table = 'executers';

    protected $fillable = [
        'name'
    ];
}
