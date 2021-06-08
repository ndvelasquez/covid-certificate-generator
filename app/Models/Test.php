<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'reference',
        'test_date',
        'test_time',
        'test_result'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
