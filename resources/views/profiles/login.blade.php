@section('title')
    login
@endsection
@extends('layout.master')
@section('main')
    @if (@session()->has('success'))
        <x-alert type='success'>
            {{session('success')}}
        </x-alert>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error )
            <x-alert type='danger'>
                {{$error}}
            </x-alert>
        @endforeach
    @endif
    <form method="POST" action="{{route('login.store')}}" >
        @csrf
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}">
            @error('email')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{old('password')}}">
            @error('password')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
