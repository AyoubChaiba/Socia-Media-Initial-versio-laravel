@section('title') {{$profile->name}} @endsection
@extends('layout.master')

@section('main')
    @if (session()->has('danger'))
    <x-alert type='danger'>
        {{session('danger') .' '. session('name')}}
    </x-alert>
    @endif
    <ul class="list-group">
        <li class="list-group-item">id : {{$profile->id}}</li>
        <li class="list-group-item">name : {{$profile->name}}</li>
        <li class="list-group-item">email : {{$profile->email}}</li>
        <li class="list-group-item">date : {{$profile->created_at->format('d-m-y')}}</li>
        <li class="list-group-item">bio : {{Str::limit($profile->bio , 50 , ' ...')}}</li>
        <li class="list-group-item">image : <img style="width:250px;" src="{{ asset('storage/'.$profile->image) }}" alt=""></li>
    </ul>

    <div class="row my-4 mx-2">
        @foreach ( $profile->publications as $value)
            <div class="card mb-3">
                <img style="width:500px;" src="{{ asset('storage/'.$value->image) }}" class="card-img-top" alt="..." >
                <div class="card-body">
                    <h5 class="card-title">{{ $value->title }}</h5>
                    <p class="card-text">{{ $value->body }}</p>
                    <p class="card-text"><small class="text-muted">{{ $value->created_at }}</small></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
