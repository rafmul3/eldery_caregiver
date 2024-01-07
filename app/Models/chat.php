<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];    

    public function user() {
        return $this->belongsTo(user::class);
    }
    public function room() {
        return $this->belongsTo(room::class);
    }
}
