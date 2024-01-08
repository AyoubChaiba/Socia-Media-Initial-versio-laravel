@section('title')
    accueil
@endsection

@extends('layout.master')

@section('main')
    <h3>accueil</h3>
    @if (@session()->has('success'))
        <x-alert type='success'>
            {{session('success')}}
        </x-alert>
    @endif
@endsection
