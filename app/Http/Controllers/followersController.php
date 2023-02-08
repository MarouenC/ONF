<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;

class followersController extends Controller
{
    public function store(Request $request){
        $follow = Follower::create([
            'follower_id' => auth()->user()->id,
            'followed_id' => $request->input('userId'),
        ]);
        return 'hello';
    }
    public function destroy($id)
    {
        $follow = Follower::where('followed_id', $id)->where('follower_id', auth()->user()->id)->delete();
        return true; 
    }
}
