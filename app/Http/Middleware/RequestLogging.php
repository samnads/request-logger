<?php

namespace App\Http\Middleware;

use App\Models\RequestLog;
use App\Models\Settings;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class RequestLogging
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $startTime; // milliseconds
    protected $endTime; // milliseconds
    // date time
    protected $start_time;
    protected $end_time;
    public function handle(Request $request, Closure $next): Response
    {
        $this->startTime = microtime(true);
        $this->start_time = now();
        return $next($request);
    }
    public function terminate(Request $request, Response $response): void
    {
        $this->endTime = microtime(true);
        $log_switch = Schema::hasTable('settings') ? Settings::first()['log_switch'] : null;
        if (@$log_switch == 1) {
            $request_log = new RequestLog;
            $request_log->url = request()->url();
            $request_log->start_time = $this->start_time;
            $request_log->end_time = now();
            $request_log->response_time = round($this->endTime - $this->startTime, 2);
            $request_log->save();
        }
    }
}
