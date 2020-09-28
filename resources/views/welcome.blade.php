@extends('layout.site_layout.app')

@section('content')


        {{-- <router-view :key="$route.fullPath"></router-view> --}}
        {{-- <transition> --}}
            <keep-alive>
              <router-view></router-view>
            </keep-alive>
          {{-- </transition> --}}
    {{-- <script  src="{{ asset('js/app.js')}}"></script> --}}
    @endsection

