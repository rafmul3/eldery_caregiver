<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];    

    public function room() {
        return $this->belongsTo(room::class);
    }

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
