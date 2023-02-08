<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Userimage;
use App\Models\Profile;
use App\Models\Follower;

class profilecontoller extends Controller{
    public function show($id)  
    {
        $user = User::findOrFail($id); 
        $auth_user = auth()->user();
        $nb_follower = $user->follower->count();
        $nb_followed = $user->followed->count();
        $isFollowing = !(Follower::where('followed_id', $id)->where('follower_id', $auth_user->id)->get()->count() == 0);
        return view ('profiles.show', compact('user', 'nb_follower', 'nb_followed', 'isFollowing')); 
    } 

    public function index(Request $request){
        $users = User::orderBy('id', 'desc');
        if ($request->has('searchId') && $request->searchId !== "") {
            $users = $users->where('id', 'like', '%' . $request->searchId . '%');
        }
        if ($request->has('searchName') && $request->searchName !== "") {
            $users = $users->where('username', 'like', '%' . $request->searchName . '%');
        }
        if ($request->has('filter') && $request->filter !== "") {
            $users = $users->where('role', 'like', '%' . $request->filter . '%');
        }
        $users = $users->paginate(30);
        return view('profiles.index',compact('users'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view ('profiles.edit', compact('user'));  // edit function will be mode advanced in showing
        //$user = User::findOrFail($user);
        //return view('profiles.edit', ['user' => $user]);
    }
    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if($user && $request->has('role') && !$request->has('username') && !$request->has('user_bio')) {
            $user->update([
                'role' =>  $request->input('role')
            ]);
            return redirect()->back();
        } else {
            $validated =  $request -> validate([
                'username' => ['required', 'string'],
                'user_bio' => ['required', 'string'],
                'role' => ['string'], 
            ]);
            if($request->has('user_image')){
                if(isset($user->user_image)){
                    $user->user_image->delete();
                }
                $user_image_path = request('user_image')->store("uploads","public");
                $image= Image::make(public_path("storage/{$user_image_path}"))->fit(1200,1200);
                $image -> save();
                $userImage = Userimage::create([
                    'user_id' =>  $user->id,
                    'user_image_path' => $user_image_path
                ]);
            }
        
            //this will output data-uri (base64 image data)
            //something like data:image/png;base64,iVBORw0KGg....
            //Avatar::create('Joko Widodo')->toBase64();
    
            //user
            $user->update([
                'username' => $validated['username'],
                'user_bio' => $validated['user_bio']
            ]);
            if($request->has('role')){
            $user->update([
                'role' =>  $validated['role'] 
            ]);
            };
        }

        if($user) {
            return redirect('/profile/' . $user->id);
        } else {
            return redirect('/profile/' . $request->input('id'))->withErrors('User not found');
        }
    }
      
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();    
        return redirect('/profile');
    }
}
