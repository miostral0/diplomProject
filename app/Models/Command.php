<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'user_id',
        'type',
        'for_user',
        'date',
        'description'
    ];

    // Cast 'date' to a Carbon (datetime) instance automatically
    protected $casts = [
        'date' => 'datetime',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
