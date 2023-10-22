<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Providers\RouteServiceProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /////////// function checks the roles  of the authentified user
    public function hasRole(string $role)
    {
        return $this->getAttribute("role") === $role; // getAttributes return the value from the table based on the authetified user
    }

    public function isAdmin(): bool
    {
        return $this->hasRole("admin"); //return boolean
    }

    public function isUser(): bool
    {
        return $this->hasRole("user"); //return boolean
    }

    public function isEditor(): bool
    {
        return $this->hasRole("editor"); //hasRole :call the function bellow ///return boolean


    }

    ////////////////// default redirection when the user authentificated
    public function getDefaultRedirectionRout()
    {
        if ($this->isAdmin()) {
            return ("admin_dashboard");
        } elseif ($this->isEditor()) {
            return ("editor_dashboard");

        } else {
            return RouteServiceProvider::HOME; // return the default route of breeze
        }
    }


}
