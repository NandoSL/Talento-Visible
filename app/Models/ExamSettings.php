<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'course_completed',
        'camera_detection',
        'camera_screen_record',
        'microphone_required',
        'keyboard_events',
    ];
}
