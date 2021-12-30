<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
    ];

    public function isAdmin(): bool
    {
        $roles = explode('|', $this->roles);

        if (in_array('root', $roles)) {
            return true;
        }
        return false;
    }

    public function hasRoles($role): bool
    {
        $userRoles = explode('|', $this->roles);

        if (is_array($role)) {
            foreach ($role as $r) {
                if (in_array($r, $userRoles)) {
                    return true;
                }
            }
        } else {
            if (in_array($role, $userRoles)) {
                return true;
            }
        }
        return false;
    }

    public function hasFeatures($feature): bool
    {
        $userFeatures = explode('|', $this->features);

        if (is_array($feature)) {
            foreach ($feature as $f) {
                if (in_array($f, $userFeatures)) {
                    return true;
                }
            }
        } else {
            if (in_array($feature, $userFeatures)) {
                return true;
            }
        }
        return false;
    }
}