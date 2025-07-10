@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Dashboard</h1>
    <p>Welcome, {{ auth()->user()->name }}</p>
@endsection
