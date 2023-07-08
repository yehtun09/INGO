@extends('layouts.app-master')
@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <h1>{{ __('labels.dashboard') }}</h1>
            <span>Only authenticated users can acess this section</span>
        @endauth

        @guest
            <h1>{{ __('labels.home_page') }}</h1>
            <span>Only Guest users can acess this section</span>
        @endguest

        <div>
            @can('isAdmin')
                <button class="btn btn-success">Admain Access</button>
            @endcan
            @can('isManager')
                <button class="btn bt-success">Manager Access</button>
            @endcan
            @can('isUser')
                <button class="btn btn-primary">User Access</button>
            @endcan
        </div>
    </div>
@endsection
