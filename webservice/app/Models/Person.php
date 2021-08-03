<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Person extends Model
{
    use HasFactory;

    /**
    * The table associated with the model.
    *
    * @var string
    */
   protected $table = 'persons';    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastName',
        'birthday',
        'genre',
        'cpf',
        'rg',
        'zip_code',
        'address',
        'number',
        'neighborhood',
        'complement',
        'state',
        'city',
        'phone',
        'cell_phone',
    ];

    protected $guarded = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
