<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $table = 'people';


    protected $fillable = [
      'name',
      'email',
    ];
    

    public function contacts(){
        return $this->hasMany(\App\Models\Contact::class);
    }



}
