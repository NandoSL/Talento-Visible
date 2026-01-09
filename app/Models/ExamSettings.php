<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'hours',
        'show_results',
        'course_completed',
        'person_detection',
        'camera_screen_record',
        'microphone_required',
        'keyboard_events',
        'window_detection'
    ];
}
