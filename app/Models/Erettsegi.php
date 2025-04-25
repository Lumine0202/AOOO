<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erettsegi extends Model
{
    use HasFactory;

    protected $table = 'erettsegi'; // Explicitly specify the table name

    protected $fillable = ['title', 'content', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
