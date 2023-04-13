@extends('layouts.app', ['page' => __('Posts'), 'pageSlug' => 'posts'])

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1 class="title">{{ _('Posts') }}</h1>
                </div>
                @include('alerts.success')
                <div>
                    <a class="btn btn-primary btn-link" href="{{ Route("posts.create") }}">Create Post</a>
                </div>
                <div>
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Title
                                </th>

                                @if(Auth::id() == 1)
                                    <th>
                                        User
                                    </th>
                                @endif

                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{$post->title}}
                                    </td>
                                    @if(Auth::id() == 1)
                                        <td>
                                            {{$post->user->name}}
                                        </td>
                                    @endif
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-link">
                                                <i class="tim-icons icon-paper"></i>
                                            </a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-link" >
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{route('posts.delete', $post->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-primary btn-link">
                                                    <i class="tim-icons icon-trash-simple"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
