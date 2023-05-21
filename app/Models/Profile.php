<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['active', 'name', 'user_id', 'register_code', 'cpf', 'phone', 'birthdate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBirthdateAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

}
