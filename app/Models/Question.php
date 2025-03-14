<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'utilisateur_id',
    ];


    public function utilisateur() {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }
    public function comments() {
        return $this->hasMany(Comment::class, 'question_id');
    }
    public function likes() {
        return $this->hasMany(Like::class);
    }
}
