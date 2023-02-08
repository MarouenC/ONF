@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class='pt-4'>Users table</h2>
    <div class="container">
        <form method="GET" action="{{ url("/profile") }}">
            <div class="row pt-4">
                <div class="col-md-3 py-1">
                    <input class="form-control search-bar" name="searchId" type="search" placeholder="Search user by ID" aria-label="Search" >
                </div>
                <div class="col-md-3 py-1">  
                    <input class="form-control search-bar" name="searchName" type="search" placeholder="Search user by name" aria-label="Search" >
                </div>
                <div class="col-md-3 py-1">
                    <select class="form-select mb-3" name="filter" aria-label="Default select example">
                        <option selected disabled>Search by role</option>
                        <option value="admin">Administrator</option>
                        <option value="partner">Partners</option>
                        <option value="user">Users</option>
                    </select>
                </div>
                <div class="col-md-3 text-center">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container pt-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Username</th>
                <th scope="col">current Role</th>
                <th scope="col">manage user</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user) 
                    <tr class="align-baseline">
                        <th scope="row">{{ $user->id }}</th>
                        <td><a href="/profile/{{ $user->id }}">{{ $user->username }}</a></td>
                        <td>{{ $user->role }} </td>
                                <td>
                                <form method="POST" action="{{ route('profile.update',$user->id) }}">
                                    @method('PATCH') 
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select d-inline-block" name="role" aria-label="Default select example">
                                                <option value="user">User</option>
                                                <option value="partner">Partner</option>
                                                <option value="admin">Administrator</option>
                                            </select>
                                        </div>
                                        <div class="col d-flex justify-content-evenly">
                                            <button class="btn btn-success d-inline-block" type="submit">Save</button>
                                            </form>
                                        
                                            <form action="{{ route('profile.destroy', $user->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                    <input name="id" value="{{ $user->id }}" hidden>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this user?')">delete</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col d-flex justify-content-center">
             {{$users->Links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection
