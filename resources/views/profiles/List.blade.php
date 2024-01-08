@section('title')
    profiles
@endsection
@extends('layout.master')
@section('main')
    @if (session()->has('success'))
        <x-alert type='success'>
            {{session('success') .' '. session('name')}}
        </x-alert>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>image</th>
                <th>bio</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $profiles as $value)
                <tr>
                    <td scope="row">{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td><img style="width:100px;" src="{{ asset('storage/'.$value->image) }}" alt=""></td>
                    <td>{{Str::limit($value->bio , 50 , ' ...')}}</td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-primary mx-1" href="{{route('profiles.show',$value->id)}}" role="button">show</a>
                            <form action="{{route('profiles.destroy',$value->id)}}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                            <form action="{{route('profiles.edit',$value->id)}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary mx-1">modifier</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$profiles->links()}}
@endsection
