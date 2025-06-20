<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'surname',
        'passport_number',
        'personal_matter_number',
        'command_id',
    ];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }
}
