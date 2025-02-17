<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userName',
        'name',
        'email',
        'password',
        'admin',
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
        'admin' => 'boolean',
    ];

    /**
     * Get the associations the user belongs to.
     */
    public function belongsToAssociations()
    {
        return $this->hasMany(BelongsToAssociation::class);
    }

    /**
     * Get the associations the user manages.
     */
    public function managesAssociations()
    {
        return $this->hasMany(ManagesAssociation::class);
    }

    /**
     * Get the member associations for the user.
     */
    public function memberAssociations()
    {
        return $this->hasMany(MemberAssociation::class);
    }

    /**
     * Get the products the user likes.
     */
    public function likedProducts()
    {
        return $this->belongsToMany(Product::class, 'user_likes_product');
    }

    /**
     * Get the orders for the user.
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the comments made by the user.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the comments the user likes.
     */
    public function likedComments()
    {
        return $this->belongsToMany(Comment::class, 'user_likes_comment');
    }

    /**
     * Get the contact forms submitted by the user.
     */
    public function contactForms()
    {
        return $this->hasMany(ContactForm::class);
    }
}
