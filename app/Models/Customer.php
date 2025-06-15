<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $fillable=[
        "name",
        "email",
        "phone",
        "address",
        "gender"
    ];

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
