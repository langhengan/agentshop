<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/06/09 0009
 * Time: 12:23
 */

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * @author yjy
     */
    public function index(Request $request){
        $record = new Permission;
        $request->flash();//闪存数据
        if($request->input('content')){
            $record = $record->where('name','like','%'.$request->input('content').'%')->orWhere('display_name','like','%'.$request->input('content').'%');
        }else{
            $record=$record->where('del_status','=','1');
        }
        $list = $record->orderBy('id','desc')->paginate(10);
        return view('admin.permission.index',compact('list'));
    }
    /**
     * @author yjy
     */
    public function create(Permission $role){
        return view('admin.permission.create',compact('role'));
    }
    /**
     * @author yjy
     */
    public function store(PermissionRequest $request){
        if($request->input('id')){
            $permission = Permission::find($request->input('id'));
        }else{
            $permission = new Permission;
        }
        //dd($request->all(),$permission,$request->input('name'));
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();
        return redirect('admin/power/permission/index');
    }
    /**
     * @author yjy
     */
    public  function  permissionDelete(Permission $permission)
    {
        $permission->del_status= 0;
        $permission->save();
        return redirect('admin/power/permission/index');
    }
}