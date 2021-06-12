<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingsRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
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
    public function index(){
        $this->authenLogin();
        $settings = $this->setting->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }
    public function create(){
        $this->authenLogin();
        return view('admin.setting.add');
    }
    public function store(AddSettingsRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('settings.index');
    }
    public function edit($id)
    {
        $this->authenLogin();
        $setting = $this->setting->find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)->update([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value
        ]);
        return redirect()->route('settings.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }



}
