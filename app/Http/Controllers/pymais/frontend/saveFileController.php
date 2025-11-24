<?php

namespace App\Http\Controllers\pymais\frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\CustomEmailNotificationController;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Course;


class saveFileController extends Controller
{
    public function saveFileInstructor(Request $request){
        //validate data before saving
        $request->validate([
            'name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|min:10|max:10',
            'position' => 'nullable',
            'job_area' => 'nullable',
            'linkedin' => 'nullable',
            'password_instructor' => 'required',
            'confirm_password_instructor' => 'required|same:password_instructor',
            'accept_terms_and_conditions' => 'required'
        ]);

        //get data from the form
        $name = $request->name;
        $last_name = $request->last_name;
        $phone = $request->phone;
        $position = $request->position;
        $job_area = $request->job_area;
        $linkedin = $request->linkedin;
        $email = $request->email;
        $password_user = $request->password_instructor;

        // Registrar al nuevo usuario en la plataforma
        $user = User::create([
            'role' => 'instructor',
            'status' => 1,
            'name' => $name,
            'last_name' => $last_name,
            'phone' => $phone,
            'position' => $position,
            'job_area' => $job_area,
            'linkedin' => $linkedin,
            'email' => $email,
            'password' => Hash::make($password_user),
        ]);

        Auth::login($user);

        //app(CustomEmailNotificationController::class)->store($request, 1);

        return redirect()->route('login');

    }

    public function saveFileSME(Request $request){
        $request->validate([
            'name' => 'nullable',
            'last_name' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|min:10|max:10',
            'position' => 'nullable',
            'job_area' => 'nullable',
            'linkedin' => 'nullable',
            'password_user' => 'required',
            'confirm_password_user' => 'required|same:password_user',
            'trade_name' => 'nullable',
            'rfc' => 'nullable',
            'legal_name' => 'nullable',
            'company_contact_phone' => 'nullable|min:10|max:10',
            'company_contact_mail' => 'nullable|email',
            'naics_code' => 'required',
            'number_employees' => 'nullable',
            'seniority' => 'nullable',
            'sector' => 'nullable',
            'products_services' => 'nullable',
            'street' => 'nullable',
            'number' => 'nullable',
            'postal_code' => 'nullable',
            'neighborhood' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'incorporated_united_states' => 'nullable',
            'company_name' => 'nullable',
            'business_line' => 'nullable',
            'company_linkedin' => 'nullable',
            'website' => 'nullable',
            'social_networking' => 'nullable',
            'accept_terms_and_conditions' => 'required'
        ]);

        $name = $request->name;
        $last_name = $request->last_name;
        $user_phone = $request->phone;
        $position = $request->position;
        $job_area = $request->job_area;
        $linkedin = $request->linkedin;
        $email = $request->email;
        $password_user = $request->password_user;
        $trade_name = $request->trade_name;
        $rfc = $request->rfc;
        $legal_name = $request->legal_name;
        $company_contact_phone = $request->company_contact_phone;
        $company_contact_mail = $request->company_contact_mail;
        $naics_code = $request->naics_code;
        $number_employees = $request->number_employees;
        $seniority = $request->seniority;
        $sector = $request->sector;
        $products_services = $request->products_services;
        $street = $request->street;
        $number = $request->number;
        $postal_code = $request->postal_code;
        $neighborhood = $request->neighborhood;
        $city = $request->city;
        $state = $request->state;
        $incorporated_united_states = $request->incorporated_united_states;
        $company_name = $request->company_name;
        $business_line = $request->business_line;
        $company_linkedin = $request->company_linkedin;
        $website = $request->website;
        $social_networking = $request->social_networking;

        // $content = "Contact Name: $contact_name\nContact Last Name: $contact_last_name\nContact Email: $contact_email\nContact Phone: $contact_phone\nContact Position: $contact_position\nContact Area Position: $contact_area_position\nContact LinkedIn: $contact_linkedin\nTrade Name: $trade_name\nRFC: $rfc\nLegal Name: $legal_name\nCompany Contact Phone: $company_contact_phone\nCompany Contact Mail: $company_contact_mail\nNAICS: $naics_code\nNumber Employees: $number_employees\nSeniority: $seniority\nSector: $sector\nProducts and/or Services: $products_services\nStreet: $street\nNumber: $number\nPostal Code: $postal_code\nNeighborhood: $neighborhood\nCity: $city\nState: $state\nIncorporated United States: $incorporated_united_states\nCompany Name: $company_name\nBusiness Line: $business_line\nCompany Linkedin: $company_linkedin\nWebsite: $website\nSocial Networking: $social_networking\nName: $name\nLast Name: $last_name\nPosition: $position\nEmail: $email\nPhone: $user_phone\nLinkedin: $user_linkedin\nPassword: $password";

        $filename = 'sme_application_' . now()->format('Y-m-d_H-i-s') . '.txt';

        // Storage::disk('local')->put('sme_applications/' . $filename, $content);

        $company_id = null;

        if($trade_name !== null) {
            // Registrar compañia en la plataforma
            $company = Company::create([
                'trade_name' => $trade_name,
                'rfc' => $rfc,
                'legal_name' => $legal_name,
                'phone' => $company_contact_phone,
                'company_mail' => $company_contact_mail,
                'naics_code' => $naics_code,
                'number_employees' => $number_employees,
                'seniority' => $seniority,
                'sector' => $sector,
                'products_services' => $products_services,
                'street' => $street,
                'number' => $number,
                'postal_code' => $postal_code,
                'neighborhood' => $neighborhood,
                'city' => $city,
                'state' => $state,
                'incorporated_united_states' => $incorporated_united_states,
                'company_name' => $company_name,
                'business_line' => $business_line,
                'company_linkedin' => $company_linkedin,
                'company_website' => $website,
                'company_social_net' => $social_networking,
            ]);

            $company_id = $company->id;

        }

        // Registrar al nuevo usuario en la plataforma en relación a la compañia
        $user = User::create([
            'role' => 'student',
            'status' => 1,
            'name' => $name,
            'last_name' => $last_name,
            'phone' => $user_phone,
            'position' => $position,
            'job_area' => $job_area,
            'linkedin' => $linkedin,
            'email' => $email,
            'password' => Hash::make($password_user),
            'company_id' => $company_id,
        ]);

        $user_id = $user->id;

        // Enrollment Introduction
        Enrollment::create([
            'user_id' => $user_id,
            'course_id' => 1,
            'enrollment_type' => 'free'
        ]);


        // Key Resources Enrollment
        $key_resources = Category::where('title', 'Key Resources')->get();
        $courses = Course::where('category_id', $key_resources[0]->id)->get();
        foreach($courses as $course) {
            Enrollment::create([
                'user_id' => $user_id,
                'course_id' => $course->id,
                'enrollment_type' => 'free'
            ]);
        }

        // Enrollment First
        $primer = Category::where('title', 'Primer')->get();
        $courses = Course::where('category_id', $primer[0]->id)->get();
        foreach($courses as $course) {
            Enrollment::create([
                'user_id' => $user_id,
                'course_id' => $course->id,
                'enrollment_type' => 'free'
            ]);
        }

        // Enrollment Accelerating
        $accelerating = Category::where('title', 'Accelerator')->get();
        $courses = Course::where('category_id', $accelerating[0]->id)->get();
        foreach($courses as $course) {
            Enrollment::create([
                'user_id' => $user_id,
                'course_id' => $course->id,
                'enrollment_type' => 'free'
            ]);
        }

        Auth::login($user);

        //app(CustomEmailNotificationController::class)->store($request, 1);

        return redirect()->route('login');
    }
}
