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
        'camera_screen_record',
        'microphone_required',
        'person_detection',
        'window_detection',
        'keyboard_events',
    ];
}
