<?php

namespace app\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table="Account";

    protected $primaryKey="Username";

    protected $autoIncrement=false;

    protected $keyType="string";

    public $timestamps=false;

    //$timestamps=false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Cf',
        'Username',
        'Nome',
        'Cognome',
        //'email',
        'Password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
    ];

    /*public function relation(){
        return $this->hasMany("App\Model\entity_relation_model");
    }*/
}
