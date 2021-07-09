<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Information;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Str;
use Mail;
class ContactController extends Controller
{
    private $info;
    private $contacts;
    public function __construct(Information $info, Contact $contacts)
    {
        $this->contacts = $contacts;
        $this->info = $info;
    }
    public function authenLogin()
    {
        if (auth()->check() && auth()->user()->role == 1){
            return Redirect::to('/')->send();
        }
        elseif (auth()->check() && auth()->user()->role == 2){
            return Redirect::to('home');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function contact(){
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $phone = $this->info->where('key','Phone')->first();
        $title = $this->info->where('key','Title')->first();
        $open = $this->info->where('key','Open')->first();
        $fb = $this->info->where('key','Facebook Link')->first();
        $ytb = $this->info->where('key','YouTube Link')->first();
        $email = $this->info->where('key','Email')->first();
        $address = $this->info->where('key','Address')->first();
        return view('contact-us',compact('categoriesLimit','phone','title','open','fb','ytb','email','address'));
    }
    public function index(){
        $this->authenLogin();
        $contact = $this->contacts->latest()->paginate(10);
        return view('admin.contact.index', compact('contact'));
    }
    public function store(request $request){
        DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        $token = Str::random(64);
        Mail::send('email.Wellcom',['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Wellcom to VapeStore');
        });
        return back()->with('message', 'We will contact you as soon as possible! Thank you.');
    }
    public function delete($id)
    {
            $this->contacts->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

    }
}
