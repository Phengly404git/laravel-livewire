<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'settings';
    protected $fillable = ['name','url','title','keyword','description','phone1','phone2',
                        'email1','email2','address','facebook','twitter','instagram','youtube'];
}
