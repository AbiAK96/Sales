<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Representative extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'representatives';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    const ROUTES = [
        'Banes Place' => 'Banes Place',
        'Cambridge Place' => 'Cambridge Place',
        'Rosmid Place' => 'Rosmid Place',
        'Gregory Road' => 'Gregory Road'
    ];

    public $fillable = [
        'name',
        'email',
        'telephone',
        'route',
        'join_date',
        'comments'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'telephone' => 'string',
        'route' => 'string',
        'join_date' => 'string',
        'comments' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'telephone' => 'required|string|max:255',
        'route' => 'required|string|max:255',
        'join_date' => 'required|string|max:255',
        'comments' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

 }
