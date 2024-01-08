@section('title')
    create publiction
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
    <form method="POST" action="{{route('publication.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
            @error('title')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">body</label>
            <textarea class="form-control" rows="5" name="body">{{old('body')}}</textarea>
        </div>

        <div class="mb-3">
            <label for="exampleimage" class="form-label">imge</label>
            <input type="file" class="form-control" name="image" accept="image/png, image/jpeg">
            @error('password')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">create Publication</button>
    </form>
@endsection
