<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'salary',
        'benefits',
        'vacancies',
        'requirements',
        'functionalities',
        'date',
        'status',
        'category_id',
        'city_id',
        'experience_id'
    ];
}
