<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InformationController extends Controller
{
    private $info;
    public function __construct(Information $info)
    {
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
    public function index()
    {
        $this->authenLogin();
        $infomation = $this->info->all();
        return view('admin.information.index',compact('infomation'));
    }
    public function edit($id)
    {
        $this->authenLogin();
        $infomation = $this->info->find($id);
        return view('admin.information.edit', compact('infomation'));
    }
    public function update(Request $request, $id)
    {
        $this->info->find($id)->update([
            'content' => $request->value,
        ]);
        return redirect()->route('information.index');
    }

}
