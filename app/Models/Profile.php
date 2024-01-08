<?php

namespace App\Models;

use App\Models\publication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['created_at'];

    protected $fillable =[
        'name' ,
        'email' ,
        'password' ,
        'bio' ,
        'image',
    ];

    public function getImageAttribute($value){
        return $value??'images/profiles/profile.png';
    }

    public function publications() {
        return $this->hasMany(publication::class,'id_profile');
    }
}

