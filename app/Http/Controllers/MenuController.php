<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Components\MenuRecusive;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
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
        $menus = $this->menu->paginate(3);
        return view('admin.menus.index',compact('menus'));
    }

    public function create()
    {
        $this->authenLogin();
        $optionSelect = $this->menuRecusive->menuRecusiveAdd();
        return view('admin.menus.add', compact('optionSelect'));
    }
    public function store(Request $request)
    {
        $this->menu->create([
            'name' =>$request->name,
            'parent_id'=>$request ->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id, Request $request)
    {
        $this->authenLogin();
        $menuFollowIdEdit=$this->menu->find($id);
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view ('admin.menus.edit',compact('optionSelect','menuFollowIdEdit'));
    }
    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' =>Str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id)
    {
        try {
            $this->menu->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);

        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
}
