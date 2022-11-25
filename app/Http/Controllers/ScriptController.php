<?php

namespace App\Http\Controllers;

use App\Models\Script;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScriptController extends Controller {


    public function index(Request $request) {
        $scripts = DB::table('scripts')->select('id')->orderByDesc('updated_at')->limit(25)->get();
        $scripts = $scripts->map(function ($script) {
            return $script->id;
        });
        return response()->json($scripts->toArray());
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
}
