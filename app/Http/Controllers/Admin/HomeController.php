<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/06/08 0008
 * Time: 21:32
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use App\Menu\MenuPower;
class HomeController extends Controller
{
    /**
     * @author yjy
     */
    public function home(MenuPower $menuPower)
    {
        $system = $this->sys_linux();
        $this->ifUserDoNotHavePermission();
        return view('admin.home',compact('system'));
    }
    /**
     * @author yjy
     */
    private function ifUserDoNotHavePermission()
    {
        $user = Auth::guard('admin')->user();
        if (!$user->can('home')) {
            abort('403');
        }
    }

    function sys_linux()
    {
        /*
        exec('top -b -n 1 -d 3',$out);

        $Runtime = explode('  ', $out[0]);
        $Cpu = explode('  ', $out[2]);
        $Mem = explode('  ', $out[3]);

        $cpu = str_replace(array(' us,',''),'',$Cpu[1]);
        $runTime = str_replace(array(',',''),'',$Runtime[0]);
        $runTime = explode(' ',$runTime);
        $runTime = intval($runTime[4]/24)."天".intval($runTime[4]/60)."小时".$runTime[4]."分钟";

        $memUsed = str_replace(array(' used,'),'',$Mem[3]);
        $memTotal = str_replace(array(' total,'),'',$Mem[1]);

        $data['cpu'] = $cpu;
        $data['runtime'] = $runTime;
        $data['memoryUsed'] = $memUsed;
        $data['memoryTotal'] = $memTotal;
        */
        return $data = array();
    }
}