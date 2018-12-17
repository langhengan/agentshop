<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/06/08 0008
 * Time: 23:51
 */

namespace App\Http\Controllers\Admin;

use App\Models\RoleUser;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UserController extends Controller
{
    protected $user_url= "admin/power/user/index";
    //用户检索与列表页的展示
    /**
     * @
     */
    public function index(Request $request)
    {
        $record = new User;
        $request->flash();//闪存
        if($request->input('content')){
            $record = $record->where('name','like','%'.$request->input('content').'%');
        }else{
            $record=$record->where('del_status','=','1');
        }
        $list = $record->orderBy('id','desc')->paginate(10);
        return view('admin.user.index',compact('list'));
    }

    //用户的创建视图
    //User $user 传入的参数为user模型
    /**
     * @
     */
    public function create(User $user)
    {
        $role = Role::orderBy('id','desc')->select('id','display_name')->get();
        $ower = RoleUser::where('user_id',$user->id)->get();
        $ower = collect($ower)->pluck('role_id')->toArray();

        return view('admin.user.create',compact('user','role','ower'));
    }

    //用户的创建和修改操作
    //UserRequest $reuqest传入的是UserRequest的实例  UserRequest继续自Request
    /**
     * @
     */
    public function store(UserRequest $request){
        if($request->input('id')){
            $user = User::find($request->input('id'));
        }else{
            $user = new User;
        }

        DB::beginTransaction();
        try {
            if(!$request->input('id') || $request->input('id')&&$request->input('password')){
                $user->password = \Hash::make($request->input('password'));
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();

            $roles['id'] = $request->input('roles');
            $user->roles()->sync($roles['id']);
            DB::commit();
            return redirect('admin/power/user/index');
        }catch(\Exception $exception){
            DB::rollBack();
            return response($exception->getMessage());
        }
    }
    //用户的删除   $user为具体的id的一条数据对象包含id name等
    /**
     * @
     */
    public  function  userDelete(User $user)
    {
        if($user)
        {
            $user->del_status= 0 ;
            $user->save();
            return redirect('admin/power/user/index');
        }
    }
}