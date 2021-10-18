<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\PackageManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index(Request $request, PackageManager $packageManager) {
        $packages = $packageManager->getEnabled(TRUE)
            ->filter(function ($package) {
                return view()->exists($package->id . '::backend.pages.help');
            })
            ->pluck('id');

        $view = $request->query('package')
            ? $request->query('package') . '::backend.pages.help'
            : 'backend.pages.help.help';

        return view('backend.pages.help.index', compact('packages', 'view'));
    }
}
