<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Practicians extends Model
{
    protected $fillable = [
        'name',
        'avatar',
        'nim',
        'study_program',
        'hobby',
        'skills',
        'email',
        'github_url',
        'bio',
    ];

    protected function casts(): array
    {
        return [
            'skills' => 'array',
        ];
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experiences::class, 'practician_id');
    }
}
