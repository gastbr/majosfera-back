<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Association extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tax_id',
        'business_name',
        'address',
        'email',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * Get the users who manage the association.
     */
    public function managers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'manages_associations');
    }

    /**
     * Get the users who belong to the association.
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'belongs_to_associations');
    }

    /**
     * Get the products for the association.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
