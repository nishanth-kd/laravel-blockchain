<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $fillable = ['key', 'name', 'address'];
}
