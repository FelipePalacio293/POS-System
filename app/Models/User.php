<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;


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
        'google2fa_secret',
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
    ];

    public function roles() {
        return $this->hasMany('App\Models\Rol', 'IdUsuario', 'id');
    }

    public function esAdmin($id){
        return DB::table('users')->join('rol', 'users.id', '=', 'rol.IdUsuario')->where('users.id', '=', $id)->where('rol.rol', '=', 1)->exists();
    }

    public function esVendedor($id) {
        return DB::table('users')->join('rol', 'users.id', '=', 'rol.IdUsuario')->where('users.id', '=', $id)->where('rol.rol', '=', 2)->exists();
    }

    public function isAdmin(){
        return DB::table('users')->join('rol', 'users.id', '=', 'rol.IdUsuario')->where('users.id', '=', session('user.id'))->where('rol.rol', '=', 1)->exists();
    }

    public function isUsuario() {
        return DB::table('users')->join('rol', 'users.id', '=', 'rol.IdUsuario')->where('users.id', '=', session('user.id'))->where('rol.rol', '=', 3)->exists();
    }

    public function isVendedor() {
        return DB::table('users')->join('rol', 'users.id', '=', 'rol.IdUsuario')->where('users.id', '=', session('user.id'))->where('rol.rol', '=', 2)->exists();
    }
}
