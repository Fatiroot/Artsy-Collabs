<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Partenaire extends Model implements HasMedia
{
    use HasFactory , SoftDeletes ,InteractsWithMedia;

    protected $fillable = [
        'name_company',
        'email',

        

    ];

    public function projects() {
        return $this->hasMany(Project::class);
    }
}
