<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'date_debut',
        'date_fin',
        'status',
        'partenaire_id',
    ];

    public const STATUS_LABELS=[
        0=>'Pending',
        1=>'Accepted',
        2=>'Refused',

    ];
    

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function partenaire(){
        return $this->belongsTo(Partenaire::class);
    }
}
