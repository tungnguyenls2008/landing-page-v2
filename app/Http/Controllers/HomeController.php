<?php

namespace App\Http\Controllers;

use App\Mail\ContactArrived;
use App\Models\AboutUs;
use App\Models\Client;
use App\Models\ClientLayout;
use App\Models\Contact;
use App\Models\GeneralInfo;
use App\Models\Home;
use App\Models\Review;
use App\Models\ReviewLayout;
use App\Models\Service;
use App\Models\ServiceLayout;
use App\Models\Skill;
use App\Models\Work;
use App\Models\WorkLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome')->with([
            'general' => GeneralInfo::get()->first(),
            'contact' => Contact::get()->first(),
            'home' => Home::get()->first(),
            'about' => AboutUs::get()->first(),
            'skills' => Skill::orderBy('order')->get(),
            'work_layout' => WorkLayout::get()->first(),
            'works' => Work::orderBy('order')->with('category')->get(),
            'service_layout' => ServiceLayout::get()->first(),
            'services' => Service::orderBy('order')->get(),
            'client_layout' => ClientLayout::get()->first(),
            'clients' => Client::orderBy('order')->get(),
            'review_layout' => ReviewLayout::get()->first(),
            'reviews' => Review::orderBy('order')->get()
        ]);
    }

    public function contact(Request $request)
    {
        Mail::to(env('CONTACT_MAIL'))
            ->send(new ContactArrived($request));
        return response()->json();
    }
}
