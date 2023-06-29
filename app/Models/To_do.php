<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class To_do extends Model
{
    protected $fillable = [
        'name',
        'description',
        'for_id',
        'by_id',
        'group_id',
        'status',
    ];

    public function forUser()
    {
        return $this->belongsTo(User::class, 'for_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'by_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
}
