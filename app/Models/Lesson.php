<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function examSettings()
    {
        return $this->belongsTo(ExamSettings::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'quiz_id');
    }

    protected $fillable = [
        'title',
        'user_id',
        'course_id',
        'section_id',
        'exam_id',
        'lesson_type',
        'duration',
        'lesson_src',
        'attachment',
        'attachment_type',
        'video_type',
        'thumbnail',
        'is_free',
        'sort',
        'description',
        'summary',
        'status',
        'total_mark',
        'pass_mark',
        'retake',
    ];
}
