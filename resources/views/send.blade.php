@extends('layouts.layout')

@section('title') @parent:: Send Mail @endsection

@section('header')
    @parent:: Home Page @endsection

@section('content')
    <div class="container">
        <form method="post" action="{{route('send')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Example address</label>
                <input type="email" class="form-control" id="email" name ="email" rows="3">
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Your massage</label>
                <textarea class="form-control" id="text" name="text" rows="5"></textarea>
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
