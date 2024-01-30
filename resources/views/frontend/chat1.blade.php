@if (Auth::check())
@extends('frontend.main_master')


@section('header')
@include('frontend.body.header')
@endsection
@section('body')
<div class="gap gray-bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="page-contents">
                    @include('frontend.body.rightsidebar')

                    @livewire('chat-with',['uuid' => $uuid])
                    @include('frontend.body.liftsidebar')
                </div></div></div></div></div>


@endsection
@section('footer')
@include('frontend.body.footer')
@endsection
@else
<p>{{ route('loginreg') }}</p>
@endif
