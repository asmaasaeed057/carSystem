<?php



namespace App;



use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;



class Admin extends Authenticatable

{

    use Notifiable;



    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    protected $fillable = [

        'name', 'email', 'password', 'group_id',

    ];


    protected $hidden = [

        'password', 'remember_token',

    ];

    public function group()
    {
        return $this->belongsTo('App\Group', 'group_id');
    }


}
