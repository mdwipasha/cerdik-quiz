<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Quiz extends Model
{
    use HasFactory;

    protected $table = 'quizzes';
    protected $fillable = ['title','slug','description','image','user_id','is_private','user_emails'];
    protected $casts = [
        'is_private' => 'boolean',
        'user_emails' => 'array',
    ];
    
    public function students()
    {
        return $this->belongsToMany(User::class, 'user_quizzes', 'quiz_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($quiz) {
            $quiz->slug = Str::slug($quiz->title);
        });

        static::updating(function ($quiz) {
            $quiz->slug = Str::slug($quiz->title);
        });
    }

}
