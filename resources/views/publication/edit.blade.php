@section('title')
    edit publication
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
    <form method="POST" action="{{route('publication.update',$publication->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">id</label>
            <input type="text" class="form-control" name="id" value="{{old('id',$publication->id)}} " disabled>
            @error('id')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">title</label>
            <input type="text" class="form-control" name="title" value="{{old('title',$publication->title)}}">
            @error('title')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">body</label>
            <textarea class="form-control" rows="3" name="body">{{old('body',$publication->body)}}</textarea>
        </div>
        @error('body')
            <div class="form-text">{{$message}}</div>
        @enderror

        <div class="mb-3">
            <img src="{{ asset('storage/'.$publication->image) }}" class="img-thumbnail" alt="..." width="150px">
        </div>

        <div class="mb-3">
            <label for="exampleimage" class="form-label">imge</label>
            <input type="file" class="form-control" name="image" accept="image/png, image/jpeg">
            @error('image')
                <div class="form-text">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">update</button>
    </form>
@endsection

