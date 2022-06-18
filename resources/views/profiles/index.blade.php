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
                    <select class="form-select mb-3" name="role" aria-label="Default select example">
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
                <th scope="col">Role</th>
                <th scope="col">manage user</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user) 
                    <tr class="align-baseline">
                        <th scope="row">{{ $user->id }}</th>
                        <td><a href="/profile/{{ $user->id }}">{{ $user->username }}</a></td>
                        <td>
                            <select class="form-select" name="filter" value="{{ $user->role }}" aria-label="Default select example">
                                <option value="user">User</option>
                                <option value="partner">Partner</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </td>
                        <td class="d-flex justify-content-around mb-3">
                            <button class="btn btn-success">save</button>
                            <button class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
