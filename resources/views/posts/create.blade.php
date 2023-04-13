@extends('layouts.app', ['page' => __('Posts'), 'pageSlug' => 'posts'])

@section('content')

    <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ _('Create Profile') }}</h5>
            </div>
            <form method="post" action="{{ route('posts.store') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('post')

                    @include('alerts.success')

                    <div>
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">
                    </div>
                    <div class="form-group">
                        <label>{{ _('Title') }}</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="{{ _('Post Title') }}" required>
                    </div>

                    <div class="form-group">
                        <label>{{ _('Post Content') }}</label>
                        <textarea class="form-control" name="content" id="content" rows="10" required></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ _('Save') }}</button>
                </div>
            </form>
        </div>
    </div>
    </div>

@endsection
