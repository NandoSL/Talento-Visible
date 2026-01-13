<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamSettingsController extends Controller
{

public function updateFinishTIme(Request $request)
{
 DB::table('lessons')
    ->where('id', $request->lesson_id)
    ->update(['finish_time' => 1]);
}
public function updateFinishTImeDesactive(Request $request)
{
 DB::table('lessons')
    ->where('id', $request->lesson_id)
    ->update(['finish_time' => 0]);
}
}
