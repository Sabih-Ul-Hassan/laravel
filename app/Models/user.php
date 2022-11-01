<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class user extends Model
{
    use HasFactory;
    protected $table='user';
    protected $primaryKey='id';

    public function setPasswordAttribute($password){
        if(!($password===''))
            $this->attributes['password']=Hash::make($password);
    }

}
