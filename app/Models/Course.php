<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'duration',
        'fees',
        'image'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function payments()
    {
        return $this->belongsToMany(Payment::class);
    }
}


