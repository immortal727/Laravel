@extends('layouts.layout')

@section('title') @parent:: Login @endsection

@section('header')
    @parent:: Home Page @endsection

@section('content')
    <div class="container">
        <form method="post" action="{{route('login')}}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name ="email" rows="3" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name ="password" rows="3">
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
