<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $fillable = ['name'];

    public function Members()
    {
        return $this->belongsToMany(User::class, 'group_user');
    }

    public function MadeBy()
    {
        return $this->belongsTo(User::class, 'madeBy_id');
    }
}
