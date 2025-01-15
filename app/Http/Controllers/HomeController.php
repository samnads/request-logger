<?php

namespace App\Http\Controllers;

use App\Models\RequestLog;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;

class HomeController extends Controller
{
    protected $install_status;
    public function __construct()
    {
        $this->install_status = Schema::hasTable('request_logs') == true ? 1 : 0;
    }
    public function install_show(Request $request)
    {
        $data['install_status'] = $this->install_status;
        return view('install', $data);
    }
    public function home(Request $request)
    {
        $data['install_status'] = $this->install_status;
        return view('home', $data);
    }
    public function settings(Request $request)
    {
        $data['install_status'] = $this->install_status;
        $data['log_switch'] = Settings::first()['log_switch'];
        return view('settings', $data);
    }
    public function logs(Request $request)
    {
        $data['request_logs'] = RequestLog::orderByDesc('id')->get();
        $data['install_status'] = $this->install_status;
        return view('logs', $data);
    }
    public function view_page_1(Request $request)
    {
        $data['install_status'] = $this->install_status;
        $data['page_id'] = 1;
        usleep(5 * 1000);
        return view('page', $data);
    }
    public function view_page_2(Request $request)
    {
        $data['install_status'] = $this->install_status;
        $data['page_id'] = 2;
        sleep(2);
        return view('page', $data);
    }
    public function view_page_3(Request $request)
    {
        $data['install_status'] = $this->install_status;
        $data['page_id'] = 3;
        sleep(1);
        return view('page', $data);
    }
    public function view_page(Request $request, $page_id)
    {
        $data['install_status'] = $this->install_status;
        $data['page_id'] = $page_id;
        return view('page', $data);
    }
    public function toggle_log(Request $request)
    {
        $settings = Settings::first();
        $settings->log_switch = $request->toggle_log == 1 ? 1 : 0;
        $settings->save();
        $response['status'] = 'success';
        $response['title'] = $settings->log_switch == 1 ? 'Enabled' : 'Disabled';
        $response['message'] = 'Logs ' . ($settings->log_switch == 1 ? 'Enabled' : 'Disabled') . ' Successfully !';
        return Response::json($response, 200, array(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    public function install(Request $request)
    {
        Artisan::call('migrate');
        $response['status'] = 'success';
        $response['title'] = 'Installed !';
        $response['message'] = 'Database migrated successfully !';
        return Response::json($response, 200, array(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    public function migrate(Request $request, $page_id)
    {
        $data['install_status'] = $this->install_status;
        $data['page_id'] = $page_id;
        return view('page', $data);
    }
}
