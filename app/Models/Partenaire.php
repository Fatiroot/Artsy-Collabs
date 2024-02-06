<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partenaire extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name_company',
        'email',
        'image',
        

    ];

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
