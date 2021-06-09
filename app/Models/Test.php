<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'test_type',
        'reference',
        'test_date',
        'test_time',
        'test_result'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getDateOfTestAttribute()
    {
        return  Carbon::parse($this->test_date)->format('d/m/Y');
    }
}
