<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;   
use App\Models\User;
use App\Models\Profile;

class profilecontoller extends Controller{
    public function show($user)  
    {
        $user = User::findOrFail($user); 

        return view ('profiles.show', compact('user'));  
    } 

    public function index(Request $request){
        $users = User::orderBy('id', 'desc');
        if ($request->has('searchId') && $request->searchId !== "") {
            $users = $users->where('id', 'like', '%' . $request->searchId . '%');
        }
        if ($request->has('searchName') && $request->searchName !== "") {
            $users = $users->where('username', 'like', '%' . $request->searchName . '%');
        }
      
        $users = $users->get();
        return view('profiles.index',compact('users'));
    }

    public function edit(User $user){
        return view ('profiles.edit', compact('user'));  // edit function will be mode advanced in showing
        //$user = User::findOrFail($user);
        //return view('profiles.edit', ['user' => $user]);
    }
    public function update(User $user,Request $request){
        $validated =  $request -> validate([
            'username' => ['required', 'string'],
            'user_biography' => ['string'],
            'user_image' => ['image'],
            'role' => ['string'],
        ]);

        if ($request->has('user_image') && $request->has('user_image') !== "") {
        $user_image_path= request('user_image')->store("uploads","public");
        $image= Image::make(public_path("storage/{$user_image_path}"))->fit(1200,1200);
        $image -> save();
        }
    
        //this will output data-uri (base64 image data)
        //something like data:image/png;base64,iVBORw0KGg....
        //Avatar::create('Joko Widodo')->toBase64();

        //user
        auth()-> user()-> update([
            'username' => $validated['username'],
            'user_biography' => $validated['user_biography'],
            'role' =>$validated['role']
        ]);
        
        return redirect('/profile/' . auth()-> user()->id);
    }
      
    public function destroy(User $user){
        $user->delete();    
        return redirect('/');
    }
}
