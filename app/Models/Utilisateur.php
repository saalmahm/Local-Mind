<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utilisateur extends User {
    use HasFactory;

    protected $fillable = ['adresse', 'date_naissance', 'name', 'email', 'password', 'role'];

    public function user() {
        return $this->hasOne(User::class, 'id', 'id');
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }
}
