<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Foto extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $guarded = [''];
    
    protected $fillable = [
        'judulFoto',
        'deskripsiFoto',
        'lokasiFile',
        'tanggalDiunggah',
        'album_id',
        'user_id'
    ];

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function albums(): BelongsTo {
        return $this->belongsTo(Album::class);
    }

    public function likeFotos(): HasMany {
        return $this->hasMany(LikeFoto::class);
    }

    public function komentarFotos(): HasMany {
        return $this->hasMany(KomentarFoto::class);
    }
}
