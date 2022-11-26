<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScriptAddRequest;
use App\Models\Script;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
        $script = Script::find($id);
        $script->author = User::find($script->author_id);
        $script->language = $script->language()->name;
        return response()->json($script);
    }

    public function indexScript(Request $request) {
        $id = intval($request->route('id'));
        $script = Script::find($id);
        $script->author = User::find($script->author_id);

        // Add view
        $views = $script->views + 1;
        $script->views = $views;
        DB::table('scripts')->where('id', $id)->update(['views' => $views]);

        return view('script', ['script' => $script, 'language' => $script->language()->name]);
    }

     /**
     * Display the user's add form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
        return view('profile.add', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's scripts.
     *
     * @param  \App\Http\Requests\ProfileUpdateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addScript(ScriptAddRequest $request)
    {
        $user = $request->user();
        $name = $request->input('name');
        $description = $request->input('description');
        $scripttext = $request->input('script');

        // Create new Script
        $script = Script::create([
            'name' => $name,
            'description' => $description,
            'script' => $scripttext,
            'author_id' => $user->id,
            'category_id' => 1,
            'language_id' => 1,
            'views' => 0,
        ]);
        $script->save();

        return Redirect::route('dashboard');
    }
}
