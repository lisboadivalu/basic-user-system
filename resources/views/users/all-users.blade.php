@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Users</h4>
                </div>
                @include('alerts.success')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        @if($user->id != 1)
                                            <div class="row">
                                                <form action="{{ route('user.delete', $user->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-primary btn-link">
                                                        <i class="tim-icons icon-trash-simple"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        @else
                                          You can't delete me :D
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            {{$users->links()}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
