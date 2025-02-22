<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model {
    use HasFactory;

    protected $fillable = ['utilisateur_id', 'question_id', 'comment_id'];

    public function utilisateur() {
        return $this->belongsTo(Utilisateur::class);
    }
}
