@extends('layouts.app', ['page' => __('Posts'), 'pageSlug' => 'posts'])

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="title text-capitalize">{{$post->title}}</h1>
                </div>
                <div class="text-center">
                    <h4>{{$post->content}}</h4>
                </div>
                <div class="text-center">
                    @if(Auth::id() == 1)
                        <h7>{{$post->user->name}}, </h7>
                    @endif
                    <h7> {{date_format($post->created_at, 'd-m-y')}}</h7>
                </div>
            </div>
        </div>
    </div>

@endsection
