<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','gender','nid','password_text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
