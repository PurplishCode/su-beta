<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

     protected $primaryKey = 'id';
    protected $fillable = [
        'gambar_profile',
        'nama',
        'email',
        'password',
        'namaLengkap',
        'alamat',
        'nomor_telepon'
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

    public function fotos():HasMany{
        return $this->hasMany(Foto::class);
    }

    public function albums():HasMany{
        return $this->hasMany(Album::class);
    }

        // Under constructions. will review!
    public function likedFoto():BelongsToMany
    {
        return $this->belongsToMany(LikeFoto::class, 'likeFoto', 'foto_like');
    }

    public function likeFotos(): HasMany {
        return $this->hasMany(LikeFoto::class);
    }
    public function komentarFoto(): HasMany {
        return $this->hasMany(KomentarFoto::class);
    }
}
