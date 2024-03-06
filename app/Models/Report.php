<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'title',
        'description',
        'client_id',
        'status_id',
        'executer_id'
    ];


    public function status()
    {
        $this->belongsTo(Status::class, 'status_id', 'id');
    }
    public function client()
    {
        $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function executer()
    {
        $this->belongsTo(Executer::class, 'executer_id', 'id');
    }
}
