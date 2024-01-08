@section('title')
    publication list
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
                <th>title</th>
                <th>body</th>
                <th>profile</th>
                <th>image</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publication as $value)
                <tr>
                    <td scope="row">{{$value->id}}</td>
                    <td>{{$value->title}}</td>
                    <td>{{Str::limit($value->body , 50 , ' ...')}}</td>
                    <td>{{$value->nameProfile->name}}</td>
                    <td><img style="width:100px;" src="{{ asset('storage/'.$value->image) }}" alt=""></td>
                    <td>
                        <div class="d-flex">
                            <a class="btn btn-primary mx-1" href="{{route('publication.show',$value->id)}}" role="button">show</a>
                            @auth
                                @if (auth()->user()->id === $value->id_profile)
                                    <form action="{{route('publication.destroy',$value->id)}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                    <form action="{{route('publication.edit',$value->id)}}" method="get">
                                        @csrf
                                        <button type="submit" class="btn btn-primary mx-1">modifier</button>
                                    </form>
                                @endif
                            @endauth
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

