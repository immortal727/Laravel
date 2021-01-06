@extends('layouts.layout')

@section('title') @parent:: Register @endsection

@section('header')
    @parent:: Home Page @endsection

@section('content')
    <div class="container">
        <form method="post" action="{{route('register.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name ="email" rows="3" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name ="password" rows="3">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" rows="3">
            </div>

            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input type="file" class="form-control-file" id="avatar" name ="avatar" rows="3">
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection

{{--@section('scripts')
    <script>
        alert('111');
    </script>
@endsection--}}
