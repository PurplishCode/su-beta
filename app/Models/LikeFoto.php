<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeFoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'foto_id'
    ];

    public function users(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function fotos(): BelongsTo {
        return $this->belongsTo(Foto::class);
    }
}
