@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>{{ __("Statuses") }}</h2>
                <p>{{ __("Table undernearth shows the current collection of statuses. ") }}</p>

                <a href="{{ route('admin.status.create') }}" role="button" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    Create method
                </a>
                <table class="table mt-3">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __("Action name") }}</th>
                        <th scope="col">{{ __("Description") }}</th>
                        <th scope="col">{{ __("Created at") }}</th>
                        <th scope="col">Remove</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($statuses as $status)
                        <tr>
                            <td>{{ $status->name }}</td>
                            <td>{{ $status->description }}</td>
                            <td>{{ $status->created_at->format('j F, Y') }}</td>
                            <td>
                                <form method="post" action="{{ route('admin.status.destroy', $status) }}">
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
                {{ $statuses->links() }}
            </div>
        </div>
    </div>
@endsection
