<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

if (! function_exists('format_date')){
    function format_date($date, $format = 'd/m/Y'){
        return Carbon::createFromFormat('Y-m-d', $date )->format($format);
    }
}

if(! function_exists('successMessage')){
    function successMessage($model, $resource = null){
        $resource = $resource ?? plural_from_model($model);
        return redirect()->route("admin.$resource.index")->with('status','Action Success !');
    }
}

if(! function_exists('money')){
    function money($number){
        return number_format($number,2,',','.');
    }
}


if (! function_exists('plural_from_model')) {
    function plural_from_model($model)
    {
        $plural = Str::plural(class_basename($model));
        return Str::kebab($plural);
    }
}

if( ! function_exists('log_error')){
    function log_error($message = 'error'){
        Log::channel('custom')->info('error', [
            "eror" => $message
        ]);
    }
}

if (! function_exists('index_route')) {
    function index_route($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);

        return route("{$resource}.index", $model);
    }
}

if (! function_exists('edit_route')) {
    function edit_route($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);

        return route("{$resource}.edit", $model);
    }
}

if (! function_exists('create_route')) {
    function create_route($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);

        return route("{$resource}.create",);
    }
}

if (! function_exists('delete_route')) {
    function delete_route($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);
        return route("{$resource}.destroy",$model);
    }
}

if (! function_exists('update_route')) {
    function update_route($model, $resource = null)
    {
        $resource = $resource ?? plural_from_model($model);
        return route("{$resource}.update",$model);
    }
}

if(! function_exists('errorMessage')){
    function errorMessage($e = null, $additional = null){
        $ex = new Exception();
        $trace = $ex->getTrace();
        $traceMsg = [$trace[0],$trace[1]];
        $errMessage = $e->getMessage() ?? $ex->getMessage() ?? '';
        if (env('APP_ENV') == 'local'){
            Log::channel('custom')->error('error', [
                'user' => Auth::user()->name ?? '',
                'user_ip' => Request::ip() ?? '',
                'user_agent' => Request::userAgent() ?? '',
                "error" => $errMessage,
                "line" => $e->getLine() ?? '',
                "additional" => $additional ?? '',
                // "trace" => $traceMsg ?? ''
            ]);
        }else {
            Log::channel('slack')->error('error', [
                'user' => Auth::user()->name ?? '',
                'user_ip' => Request::ip() ?? '',
                'user_agent' => Request::userAgent() ?? '',
                "error" => $errMessage,
                "line" => $e->getLine() ?? '',
                "additional" => $additional ?? '',
                // "trace" => $traceMsg ?? ''
            ]);
        }
        return redirect()->back()->with('error', $errMessage);
    }
}

if(! function_exists('saveError')){
    function saveError($e = null,  $additional = null){
        $ex = new Exception();
        $trace = $ex->getTrace() ?? '';
        $traceMsg = [$trace[0],$trace[1]];
        $errMessage = $e->getMessage() ?? $ex->getMessage() ?? '';
        if (env('APP_ENV') == 'local'){
            Log::channel('custom')->error('error', [
                'user' => Auth::user()->name ?? '',
                'user_ip' => Request::ip() ?? '',
                'user_agent' => Request::userAgent() ?? '',
                "error" => $errMessage ?? '',
                "line" => $e->getLine(),
                "additional" => $additional ?? '',
                // "trace" => $traceMsg ?? ''
            ]);
        }else {
            Log::channel('slack')->error('error', [
                'user' => Auth::user()->name ?? '',
                'user_ip' => Request::ip() ?? '',
                'user_agent' => Request::userAgent() ?? '',
                "error" => $errMessage ?? '',
                "line" => $e->getLine(),
                "additional" => $additional ?? '',
                // "trace" => $traceMsg ?? ''
            ]);
        }
    }
}
