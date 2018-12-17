<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/06/08 0008
 * Time: 23:51
 */

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Models\PermissionRole;
use DB;
class RoleController extends Controller
{
    /**
     * 角色列表的显示与检索
     * @author yjy
     */
    public function index(Request $request){
        $record = new Role;
        $request->flash();
        if($request->input('content')){
            $record = $record->where('name','like','%'.$request->input('content').'%')->orWhere('display_name','like','%'.$request->input('content').'%');
        }else{
            $record=$record->where('del_status','=','1');
        }
        $list = $record->orderBy('id','desc')->paginate(2);
        return view('admin.role.index',compact('list'));
    }
    /**
     * 角色的创建视图
     * @author yjy
     */
    public function create(Role $role){
        $permission = Permission::select('id','display_name')->orderBy('id','desc')->get();
        $ower = PermissionRole::where('role_id',$role->id)->select('permission_id')->get();
        $ower = collect($ower)->pluck('permission_id')->toArray();
        return view('admin.role.create',compact('role','permission','ower'));
    }

    /**
     * 角色的创建与修改
     * 从传入的数据开始开启事务
     * @author yjy
     */
    public function store(RoleRequest $request){
        if($request->input('id')){
            $role = Role::find($request->input('id'));
        }else{
            $role = new Role;
        }
        DB::beginTransaction();
        try {
            $role->name = $request->input('name');
            $role->display_name = $request->input('display_name');
            $role->description = $request->input('description');
            $role->save();
            $role->perms()->sync($request->input('permission'));
            DB::commit();
            return redirect('admin/power/role/index');
        }catch(\Exception $exception){
            DB::rollBack();
            return response($exception->getMessage());
        }
    }
    /**
     * 角色的删除
     * @author yjy
     */
    public function roleDelete(Role $role)
    {
        if ($role)
        {
            $role->del_status= 0;
            $role->save();
            return redirect('admin/power/role/index');
        }
    }
}