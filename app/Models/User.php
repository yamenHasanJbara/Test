<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name', 'email', 'password',];


    /**
     * @return HasOne
     */
    public function info()
    {
        return $this->hasOne(Info::class);
    }

    /**
     * @return HasMany
     */
    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class);
    }

    /**
     * @return BelongsToMany
     */
    public function languages()
    {
        return $this->belongsToMany(
            Language::class,
            'language_user',
            'user_id',
            'language_id'
        );
    }

    /**
     * @return BelongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'skill_user',
            'user_id',
            'skill_id'
        );
    }
}
