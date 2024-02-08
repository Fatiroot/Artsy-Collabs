<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'date_debut',
        'date_fin',
        'status',

        'partenaire_id',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function partenaires(){
        return $this->belongsTo(Partenaire::class);
    }
}
