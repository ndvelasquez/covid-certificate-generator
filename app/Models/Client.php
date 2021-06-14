<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type',
        'document_number',
        'passport',
        'first_name',
        'last_name',
        'born_date',
        'age',
        'gender',
        'phone'
    ];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function setFirstNameAttribute($value)
    {
        return $this->attributes['first_name'] = strtoupper($value);
    }

    public function setLastNameAttribute($value)
    {
        return $this->attributes['last_name'] = strtoupper($value);
    }

    public function getDateOfBirthAttribute()
    {
        return  Carbon::parse($this->born_date)->format('d/m/Y');
    }
}
