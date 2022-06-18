@extends('layouts.app')

@section('content')
<div class="container">
    {{Form::open(array('url' => '/profile/'.$user->id, 'method' => 'PUT', 'files' => true))}}
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
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
                name="username" value="{{ $user->usernname}}" 
                autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="profile_biography" class="col-md-4 col-form-label text-md-end">profile biography: </label>

            <div class="col-md-6">
                <input id="profile_biography" type="text"
                 class="form-control @error('profile_biography') is-invalid @enderror" 
                 name="profile_biography" value="{{  $user->usernname}}" autocomplete="profile_biography" autofocus>
                @error('profile_biography')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="profile_image" class="col-md-4 col-form-label text-md-end">Update profile picture</label>

            <div class="col-md-6">
                <input id="profile_image" type="file"  
                class="form-control @error('profile_image') is-invalid @enderror" 
                name="profile_image" 
                enctype="multipart/form-data"
                value="{{ old('profile_image') }}">
                @error('profile_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if (auth()->user()->role=='admin')      
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
                <button class="btn btn-danger" type="submit"> Save changes</button>
            </div>
        </div>

    {{ Form::close() }}
</div>
@endsection
