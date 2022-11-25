<?php

namespace App\Http\Controllers;

use App\Models\Script;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScriptController extends Controller {


    public function index(Request $request) {
        $scripts = DB::table('scripts')->select('id')->orderByDesc('updated_at')->limit(25)->get();
        $scripts = $scripts->map(function ($script) {
            return $script->id;
        });
        return response()->json($scripts->toArray());
    }

    public function indexOwn(Request $request) {
        $user = auth()->user();
        $scripts = DB::table('scripts')->select('id')->where('author_id', $user->id)->orderByDesc('updated_at')->limit(25)->get();
        $scripts = $scripts->map(function ($script) {
            return $script->id;
        });
        return view('dashboard', ['scripts' => $scripts->toArray(), 'user' => $user]);
    }

    public function searchScripts(Request $request) {
        $search = $request->route('search');
        $scripts = DB::table('scripts')->select('id')->where('name', 'like', '%' . $search . '%')->orderByDesc('views')->limit(10)->get();
        return response()->json($scripts);
    }

    public function getScript(Request $request) {
        $id = intval($request->route('id'));
        $script = DB::table('scripts')->where('id', $id)->first();
        $script->author = User::find($script->author_id);
        return response()->json($script);
    }

    public function indexScript(Request $request) {
        $id = intval($request->route('id'));
        $script = DB::table('scripts')->where('id', $id)->first();
        $script->author = User::find($script->author_id);

        // Add view
        $views = $script->views + 1;
        $script->views = $views;
        DB::table('scripts')->where('id', $id)->update(['views' => $views]);

        return view('script', ['script' => $script]);
    }
}
