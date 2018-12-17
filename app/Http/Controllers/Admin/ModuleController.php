<?php

namespace App\Http\Controllers\Admin;

use App\Models\ModuleCategry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller
{
    //模板列表的显示
    public function index()
    {
        $moduleModel=new ModuleCategry();
        $module=$moduleModel->where('status',1)->get();
        return view('admin.moduleCate.index',compact('module'));
    }
    //获取文件的路径
    public function moduleCommon(ModuleCategry $module)
    {
       $agent_proto_module = $module->module_url;
       return view('admin.moduleCate.agent-proto-module',compact('agent_proto_module'));
    }

    //模板的添加视图
    public function addModule(ModuleCategry $module)
    {
//        phpinfo();
        return view('admin.moduleCate.create',compact('module'));
    }
    //模板的添加修改操作
    public function addAction(Request $request)
    {
        if ($id=$request->input('id')){
            $moduleModel=ModuleCategry::find($id);
        }else{
            $moduleModel=new ModuleCategry();
        }
        $moduleName = $request->input('module_name');
        $image = $request->hasFile('module_url');
        if ($image && $moduleName){
            $moduleModel->module_name = $moduleName;
            $moduleModel->module_url = $this->upLoad($images=$request->file('module_url'));
            $moduleModel->save();
            return redirect('admin/power/allModule/index');
        }else{
            return redirect('admin/power/allModule/add')->with('添加失败！！');
        }
    }
    //模板的刪除
    public function delModule(ModuleCategry $module)
    {
        if ($module){
            $module->status= 0;
            $module->save();
            return redirect('admin/power/allModule/index');
        }
    }
    /**
     * 检查一个文件或目录是否存在
     * @param 文件或文件夹路径
     * @return
     * 试图创建指定的目录的路径名.
     * @param string $pathname 文件或文件夹所在路径.
     * @param int $mode [optional] 默认情况下，默认的模式为0777(rwxrwxrwx)
     *         读、写、运行三项权限可以用数字表示，就是r=4,w=2,x=1
     *         r(Read，读取) w(Write,写入) x(eXecute，执行)
     * @param bool $recursive [optional] <p>
     * 允许嵌套目录中指定的路径创造。默认为假
     * 将文件移动到一个新的位置.
     * @param string $directory 字符串目录目标文件夹
     * @param string $name      字符串名称的新文件名
     * @return 返回文件，一个表示新文件的文件对象
     * @throws FileException if, 如果因为任何原因，文件不能被移动
     */
    //文件的上传
    public function upLoad($file)
    {

        //判断文件上传过程中是否出错
        if(!$file->isValid()){
            return '文件上传出错！';
        }
        //或者文件夹路径 如果没有则返回false
        $destPath = realpath(public_path('uploads'));
        $destPath = str_replace('\\','/',$destPath);
        $destPath = substr($destPath,3,strlen($destPath));
//        $url_path = 'http://'.$_SERVER["HTTP_HOST"].'/';
        if(!file_exists($destPath)){
            mkdir($destPath,0755,true);
        }
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $size = $file->getSize();                            //文件大小
        $mime = $file->getMimeType();
        $newName = md5(date("Y-m-d H:i:s") . $filename) . "." . $extension;
        if(!$file->move($destPath,$newName)){
            return '保存文件失败！';
        }
        $image=$destPath.'/'.$newName;
        return $image;
    }


}
