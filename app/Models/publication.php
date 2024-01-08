<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class publication extends Model
{
    use HasFactory ,SoftDeletes;


    protected $fillable  =[
        'title' ,
        'body' ,
        'image' ,
        'id_profile',
    ];

    public function nameProfile(){
        return $this->belongsTo(Profile::class,'id_profile');
    }
}
