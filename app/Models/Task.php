<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
        /**
     * Атрибуты, для которых разрешено массовое присвоение значений..
     *
     * @var array <int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'priority',
    ];

}
