@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>{{ __("Users") }}</h2>
                <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{ __("Action name") }}</th>
                            <th scope="col">{{ __("Description") }}</th>
                            <th scope="col">{{ __("Administrator") }}</th>
                            <th scope="col">{{ __("Created at") }}</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ($user->is_admin ? 'Yes' : '') }}</td>
                                <td>{{ $user->created_at->format('j F, Y') }}</td>
                                <td>
                                    <form method="post" action="{{ route('admin.users.destroy', $user) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
