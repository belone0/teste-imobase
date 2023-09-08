<?php

namespace App\Models;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'imoveis';
    protected $fillable = [
        'photo',
        'title',
        'address',
        'type',
        'value',
        'owner',
    ];
}
