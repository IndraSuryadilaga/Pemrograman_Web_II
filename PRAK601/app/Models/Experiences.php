<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experiences extends Model
{
    protected $fillable = [
        'practician_id',
        'title',
        'role',
        'image',
        'description',
        'start_date',
        'end_date',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
        ];
    }

    public function practician(): BelongsTo
    {
        return $this->belongsTo(Practicians::class);
    }
}
