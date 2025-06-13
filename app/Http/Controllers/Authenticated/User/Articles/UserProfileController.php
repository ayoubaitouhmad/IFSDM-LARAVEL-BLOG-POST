<?php

namespace App\Http\Controllers\Authenticated\User\Articles;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('pages.authenticated.user-articles.profile');
    }

    public function edit(Request $request)
    {
        $user = Auth::user();

        if ($request->has('email') && $request->email != $user->email) {
            if (!User::query()->where('email', $request['email'])->whereNot('id', $user->id)->first()) {
                $user->email = $request->email;
            } else {
                $this->danger("danger", "email already exists");
                return redirect()->back();
            }
        }
        $user->name = $request->name;
        if ($user->save()) {
            $this->success("success", "user profile updated successfully");
        }
        return redirect()->back();
    }


}
