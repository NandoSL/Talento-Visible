<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Mail\InviteMember;
use App\Models\Category;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Team_members;
use App\Models\User;
use Google\Service\CloudSearch\Id;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class TeamMembersController extends Controller
{
    public function index()
    {
        $page_data['members'] = Team_members::join('users', 'team_members.member_user_id', 'users.id')->select('users.*')
            ->where('team_members.main_user_id', Auth::user()->id)->get();

        return view('frontend.default.student.team_members.index', $page_data);
    }


    public function create()
    {
        return view('frontend.default.student.team_members.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'last_name' => 'required|min:5',
            'position' => 'required|min:6',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|size:10',
            'linkedin' => 'required',
        ]);

        $name = $request->name;
        $last_name = $request->last_name;
        $position = $request->position;
        $email = $request->email;
        $phone = $request->phone;
        $linkedin = $request->linkedin;

        $user_id = Auth::user()->id;

        $user = User::create([
            'role' => 'member',
            'name' => $name,
            'last_name' => $last_name,
            'position' => $position,
            'email' => $email,
            'phone' => $phone,
            'linkedin' => $linkedin,
            'status' => 1,
        ]);

        Team_members::create([
            'main_user_id' => $user_id,
            'member_user_id' => $user->id
        ]);

        $member_id = $user->id;

        $main_user = Auth::user()->id;
        $enrollments = Enrollment::where('user_id', $main_user)->get();
        foreach ($enrollments as $enroll) {
            Enrollment::create([
                'user_id' => $member_id,
                'course_id' => $enroll->course_id,
                'enrollment_type' => $enroll->enrollment_type
            ]);
        }

        $link = URL::temporarySignedRoute('set.password', now()->addHours(1), ['id' => $user->id]);
        //Mail::to($user->email)->send(new InviteMember($user, $link));

        return redirect()->route('team.members')->with('success', app()->getLocale() === 'en' ? 'Participant added successfully.' : 'Participante agregado con éxito.');
    }


    public function edit($id)
    {
        $page_data['member'] = User::findOrFail($id);
        return view('frontend.default.student.team_members.edit', $page_data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'last_name' => 'required|min:5',
            'position' => 'required|min:6',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|size:10',
            'linkedin' => 'required',
        ]);

        $member = User::findOrFail($id);
        $member->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'email' => $request->email,
            'phone' => $request->phone,
            'linkedin' => $request->linkedin,
        ]);

        return redirect()->route('team.members')->with('success', app()->getLocale() === 'en' ? 'Participant updated successfully.' : 'Participante actualizado con éxito.');
    }

    public function delete($id)
    {
        $member = User::where('id', $id);
        $member->delete();

        return redirect()->route('team.members')->with('success', app()->getLocale() === 'en' ? 'Participant deleted successfully.' : 'Participante eliminado con éxito.');
    }


    public function showSetPassword(Request $request, $id)
    {
        if (!$request->hasValidSignature()) {
            return response()->view('errors.404', [], 404);
        }

        return view('auth.set-password', ['id' => $id]);
    }

    public function setPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8',
            'password_confirm' => 'required|min:8|same:password',
        ]);

        $member = User::findOrFail($id);
        $member->password = bcrypt($request->password);
        $member->email_verified_at = now();
        $member->save();

        Auth::login($member);


        return redirect()->route('dashboard');
    }

}
