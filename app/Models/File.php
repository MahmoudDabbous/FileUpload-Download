<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'location', 'type_id'];

    public function scopeSameType(Builder $query, string $type)
    {
        return $this->where('type_id', $type);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
