<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;
    protected $fillable = ['titulo', 'publicado_ano', 'editorial', 'portada', 'category_id', 'author_id'];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo{
        return $this->belongsTo(Author::class);
    }

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class, 'id_libro', 'id_libro');
    }
}
