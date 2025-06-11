
@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    <a href="{{ route('admin.contact_forms.index') }}" class="btn btn-primary mb-4">View Feedback</a>

    <!-- Other dashboard content -->
@endsection
