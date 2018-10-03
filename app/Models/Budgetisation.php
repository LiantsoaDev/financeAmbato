<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budgetisation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'budget_compte';

     /**
     * The timestamps that are mass assignable.
     *
     * @var array
     */

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array('budget_id', 'compte_id');

    /**
     * The attributes that are mass visible.
     *
     * @var array
     */

    protected $visible = array('budget_id', 'compte_id','created_at','updated_at');
}
