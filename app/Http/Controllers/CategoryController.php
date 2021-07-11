<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
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
    public function create()
    {
        $this->authenLogin();
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=>Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function index()
    {
        $this->authenLogin();
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));

    }
    public function getCategory($parent_id){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
    }
    public function edit($id)
    {
        $this->authenLogin();
        $category = $this->category->find($id);
        $htmlOption=$this->getCategory($category->parent_id);
        return view('admin.category.edit',compact('category','htmlOption'));
    }
    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' =>Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');

    }

    public function delete($id)
    {
        try {
            $this->category->find($id)->delete();
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
