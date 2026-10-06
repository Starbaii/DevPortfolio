<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'title', 'body', 'status'];

    /** Relationship: Post belongs to User */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Scope: only published */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /** Scope: only pending */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}