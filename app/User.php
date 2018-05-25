<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
	'avatar', 'uselocalavatar', 'provider_id', 'provider',
	'access_token', 'infotext', 'gender',
    'birthdate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verifyUser()
    {
	    return $this->hasOne('App\VerifyUser');
    }
    

    public function getAvatarUrl()
    {
        switch (Auth::user()->provider) {
            case 'google':
            $url = str_replace('sz=50', 'sz=150', Auth::user()->avatar) ;
            return $url;
            break;
            case 'facebook':
            return 'https://graph.facebook.com/'. Auth::user()->provider_id.'/picture?width=150&height=150';
            break;
            default:
            if (Auth::user()->uselocalavatar) {
                return Auth::user()->avatar;
            }
            return '/images/avatars/blank-profile-picture.png';
        }

    }

}
