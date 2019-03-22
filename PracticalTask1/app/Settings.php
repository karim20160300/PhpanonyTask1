<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Settings extends Model
{
    //
    use Notifiable;
	protected $table= 'settings';
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sitename', 'siteemail', 'sitekeywords','desc','status','maintanancemsg',
    ];



}
