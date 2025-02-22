<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'utilisateur_id',
        'question_id',
    ];

    public function utilisateur() {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function question() {
        return $this->belongsTo(Question::class, 'question_id');
    }
}