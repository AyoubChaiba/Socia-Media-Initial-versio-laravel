@section('title')
    modifier
@endsection
@extends('layout.master')
@section('main')
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <x-alert type='danger'>
                {{$error}}
            </x-alert>
        @endforeach
    @endif
    <form method="POST" action="{{route('profiles.update',$profile->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">id</label>
            <input type="text" class="form-control" name="id" value="{{old('id',$profile->id)}} " disabled>
            @error('name')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">name</label>
            <input type="name" class="form-control" name="name" value="{{old('password',$profile->name)}}">
            @error('name')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{old('email',$profile->email)}}">
            @error('email')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password" >
            @error('password')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password confirmation</label>
            <input type="password" class="form-control" name="password_confirmation" >
            @error('password')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleimage" class="form-label">imge</label>
            <input type="file" class="form-control" name="image" accept="image/png, image/jpeg">
            @error('password')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">description</label>
            <textarea class="form-control" rows="3" name="bio">{{old('bio',$profile->bio)}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">update</button>
    </form>
@endsection
