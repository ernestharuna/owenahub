<?php

namespace App\Models;

use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'email_verified_at'
    ];

    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function slice_enrollment(): HasMany
    {
        return $this->hasMany(SliceEnrollment::class);
    }

    public function social_handle(): HasOne
    {
        return $this->hasOne(SocialHandle::class);
    }

    public function misc_info(): HasOne
    {
        return $this->hasOne(MiscInfo::class);
    }

    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function mentor_review(): HasMany
    {
        return $this->hasMany(MentorReview::class);
    }

    /**
     * Get all of the notification for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notification(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Get the display_image associated with the Mentor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function display_image(): HasOne
    {
        return $this->hasOne(DisplayImage::class);
    }


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
}
