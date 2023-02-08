@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container text-end">
        <form action="{{ route('profile.destroy', $user->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input name="id" value="{{ $user->id }}" hidden>
            <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this user?')"><i class="bi bi-trash"></i></button>
        </form>
    </div>
    <form method="POST" action="/profile/{{ $user->id }}" accept-charset="UTF-8" enctype="multipart/form-data">
        @method('PATCH') 
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="text-center mb-5"> Edit Profile</h2>
        <div class="row mb-3">
            <label for="username" class="col-md-4 col-form-label text-md-end">Username: </label>

            <div class="col-md-6">
                <input id="username" type="text" class="form-control 
                @error('username') is-invalid @enderror" 
                name="username" value="{{ $user->username }}" 
                autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="user_bio" class="col-md-4 col-form-label text-md-end">profile biography: </label>
            <div class="col-md-6">
                <input id="user_bio" type="text"
                 class="form-control @error('user_bio') is-invalid @enderror" 
                 name="user_bio" value="{{ $user->user_bio}}" autocomplete="user_bio" autofocus>
                @error('user_bio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="user_image" class="col-md-4 col-form-label text-md-end">Update profile picture</label>
            <div class="col-4">
                <input id="user_image" type="file"  
                class="form-control @error('user_image') is-invalid @enderror" 
                name="user_image" 
                enctype="multipart/form-data"
                value="{{$user->user_image_1 }}"
                accept="image/*" onchange="loadFileImage1(event)">

                @if(isset($user->user_image[0]))
                    <img id="output1" style="max-height:10rem;" src="/storage/{{ $user->user_image[0]->user_image_path }}"/>
                @else
                    <img id="output1" style="max-height:10rem;"/>
                @endif
                @error('user_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        @if (auth()->user()->role=='admin')  
        <div class="row mb-3">
            <label  class="col-md-4 col-form-label text-md-end">current role : </label>
            <div class="col-md-6 pt-2">
                {{ $user->role }}
            </div>
        </div>    
        <div class="row mb-3">
            <label for="role" class="col-md-4 col-form-label text-md-end">role: </label>
            
            <div class="col-md-6">
                <select class="form-select mb-3" name="role" aria-label="Default select example" style="width:8rem;">
                    <option value="user">User</option>
                    <option value="partner">Partner</option>
                    <option value="admin">Administrator</option>
                </select>
            </div>
        </div>
        @endif
        <div class="row mb-3">
            <div class="container my-5 text-center">
                <button class="btn btn-success" type="submit"> Save changes</button>
            </div>
        </div>
    </form>
</div>
@endsection
