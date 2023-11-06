<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = ['name','phone', 'address', 'title','price','description','quantity','image','status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'name');
    }
}
