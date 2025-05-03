<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'command_id',
        'first_name',
        'last_name',
        'surname',
        'passport_number',
        'personal_matter_number'
    ];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }
}
