<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Loan extends Model
{
    /** @use HasFactory<\Database\Factories\LoanFactory> */
    use HasFactory;
    protected $fillable = ['fecha_prestamo', 'fecha_devolucion', 'estado', 'book_id', 'user_id'];

    public function book(): BelongsTo{
        return $this->belongsTo(Book::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
