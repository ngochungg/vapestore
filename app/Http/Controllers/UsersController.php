<?php

namespace App\Http\Controllers;

use App\Components\MatchOldPassword;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class UsersController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
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
        $users = $this->user->paginate(5);
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        $this->authenLogin();
        return view('admin.user.add');
    }
    public function store(UserAddRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' =>Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
                'role' => $request->role,
            ];
            $dataImage = $this->storageTraitUploadFront($request, 'image_path', 'User');
            if (!empty($dataImage)) {
                $dataInsert['image_name'] = $dataImage['file_name'];
                $dataInsert['image_path'] = $dataImage['file_path'];
            }
            $this->user->create($dataInsert);
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }
//    public function edit($id)
//    {
//        $this->authenLogin();
//        $user = $this->user->find($id);
//        return view('admin.user.edit',compact('user'));
//    }
//    public function update(UserAddRequest $request, $id)
//    {
//        try {
//            $dataInsert = [
//                'name' => $request->name,
//                'email' => $request->email,
//                'password' =>Hash::make($request->password),
//            ];
//            $dataImage = $this->storageTraitUpload($request, 'image_path', 'User');
//            if (!empty($dataImage)) {
//                $dataInsert['image_name'] = $dataImage['file_name'];
//                $dataInsert['image_path'] = $dataImage['file_path'];
//            }
//            $this->user->find($id)->update($dataInsert);
//            return redirect()->route('users.index');
//        } catch (\Exception $exception) {
//            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
//        }
//    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }
    public function details($id)
    {
        $this->authenLogin();
        $user = $this->user->find($id);
        return view('admin.user.details',compact('user'));
    }
    public function editPass($id){
        $this->authenLogin();
        $user = $this->user->find($id);
        return view('admin.user.editPass',compact('user'));
    }
    public function updatePass(request $request, $id){
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        $this->authenLogin();
        $user = $this->user->find($id);
        return view('admin.user.details',compact('user'));
    }


    public function editInformation($id)
    {
        $this->authenLogin();
        $user = $this->user->find($id);
        return view('admin.user.edit',compact('user'));
    }
    public function updateInformation(Request $request, $id)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'email' => ['required'],
            'name' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
//        try {
            $dataInsert = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
            ];
            $dataImage = $this->storageTraitUpload($request, 'image_path', 'User');
            if (!empty($dataImage)) {
                $dataInsert['image_name'] = $dataImage['file_name'];
                $dataInsert['image_path'] = $dataImage['file_path'];
            }
            $this->user->find($id)->update($dataInsert);
            $user = $this->user->find($id);
            return view('admin.user.details',compact('user'));
//        } catch (\Exception $exception) {
//            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
//        }
    }

    public function Register () {
        return view('front.customer.registration');
    }
    public function Registration (Request $request) {
//        try {
            $dataInsert = [
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' =>Hash::make($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'birthday' => $request->birthday,
                'gender' => $request->gender,
            ];
            $dataImage = $this->storageTraitUploadFront($request, 'image_path', 'User');
            if (!empty($dataImage)) {
                $dataInsert['image_name'] = $dataImage['file_name'];
                $dataInsert['image_path'] = $dataImage['file_path'];
            }
            $this->user->create($dataInsert);
            return redirect()->route('homef');
//        } catch (\Exception $exception) {
//            Log::error('Lỗi : ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
//        }
    }

}
