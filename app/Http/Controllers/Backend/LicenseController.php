<?php

namespace App\Http\Controllers\Backend;

use App\Services\DotEnvService;
use App\Services\LicenseService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LicenseController extends Controller
{
    public function index() {
        return view('backend.pages.license');
    }

    public function register(Request $request, LicenseService $ls, DotEnvService $dotEnvService)
    {
        $env = $dotEnvService->load();
        $result = $ls->register($request->code, $request->email);

        if ($result->success) {
            $env = array_merge($env, ['PURCHASE_CODE' => $request->code, 'LICENSEE_EMAIL' => $request->email, 'SECURITY_HASH' => $result->message]);
            $dotEnvService->save($env);
            return redirect()->route('backend.license.index')->with('success', __('Your license is successfully registered!'));
        } else {
            $env = array_merge($env, ['PURCHASE_CODE' => '', 'LICENSEE_EMAIL' => '', 'SECURITY_HASH' => '']);
            $dotEnvService->save($env);
            return back()->withInput()->withErrors($result->message);
        }
    }
}
