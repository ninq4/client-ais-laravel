<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'title',
        'description',
        'client_id',
        'executer_id'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function executer()
    {
       return $this->belongsTo(Executer::class, 'executer_id', 'id');
    }
}
