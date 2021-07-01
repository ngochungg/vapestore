<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsAddRequest;
use App\Models\Category;
use App\Models\Information;
use App\Models\NewBlog;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    use StorageImageTrait;
    private $newBlog;
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
    public function __construct(NewBlog $newBlog)
    {
        $this->newBlog = $newBlog;
    }

    public function index()
    {
        $this->authenLogin();
        $news = $this->newBlog->latest()->paginate(5);
        return view('admin.newBlogs.index', compact('news'));
    }
    public function create(){
        $this->authenLogin();
        return view('admin.newBlogs.add');
    }
    public function store(NewsAddRequest $request)
    {
        try {
            $dataInsert = [
                'news_title' => $request->news_title,
                'news_content' => $request->contents
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'Newsblogs');
            if (!empty($dataImageSlider)) {
                $dataInsert['image'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->newBlog->create($dataInsert);
            return redirect()->route('new.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }
    public function delete($id) {
        try {
            $this->newBlog->find($id)->delete();
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
    public function edit($id){
        $this->authenLogin();
        $newBlog = $this->newBlog->find($id);
        return view('admin.newBlogs.edit',compact('newBlog'));
    }
    public function update(Request $request, $id)
    {
        try {
            $dataUpdate = [
                'news_title' => $request->news_title,
                'news_content' => $request->contents
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if( !empty($dataImageSlider) ) {
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            }
            $this->newBlog->find($id)->update($dataUpdate);
            return redirect()->route('new.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }
    public function details($id){
        $this->authenLogin();
        $news = $this->newBlog->find($id);
        return view('admin.newBlogs.details',compact('news'));
    }
    public function frontNew(){
        $phone = Information::where('key','Phone')->first();
        $title = Information::where('key','Title')->first();
        $open = Information::where('key','Open')->first();
        $fb = Information::where('key','Facebook Link')->first();
        $ytb = Information::where('key','YouTube Link')->first();
        $email = Information::where('key','Email')->first();
        $address = Information::where('key','Address')->first();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $news = $this->newBlog->latest()->paginate(10);
        return view('front.new.new',compact('categoriesLimit','phone','title',
            'open','fb','ytb','email','address','news'));
    }
    public function front2New($id){
        $phone = Information::where('key','Phone')->first();
        $title = Information::where('key','Title')->first();
        $open = Information::where('key','Open')->first();
        $fb = Information::where('key','Facebook Link')->first();
        $ytb = Information::where('key','YouTube Link')->first();
        $email = Information::where('key','Email')->first();
        $address = Information::where('key','Address')->first();
        $categoriesLimit = Category::where('parent_id',0)->take(5)->get();
        $news = $this->newBlog->find($id);
        return view('front.new.newDetail',compact('categoriesLimit','phone','title',
            'open','fb','ytb','email','address','news'));
    }
}
