@section('title') {{$publication->name}} @endsection
@extends('layout.master')

@section('main')
    @if (session()->has('danger'))
    <x-alert type='danger'>
        {{session('danger') .' '. session('name')}}
    </x-alert>
    @endif
    <ul class="list-group">
        <li class="list-group-item">id : {{$publication->id}}</li>
        <li class="list-group-item">title : {{$publication->title}}</li>
        <li class="list-group-item">body : {{$publication->body}}</li>
        <li class="list-group-item">date : {{$publication->created_at->format('d-m-y')}}</li>
        @if (!is_null($publication->image))
            <li class="list-group-item">image : <img style="width:250px;" src="{{ asset('storage/'.$publication->image) }}" alt=""></li>
        @endif
    </ul>

@endsection
