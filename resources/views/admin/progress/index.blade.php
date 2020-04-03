@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>{{ __("Progess Actions") }}</h2>
                <p>{{ __("Table undernearth shows the current collection of actions that can be used in application progress. ") }}</p>
                <a href="{{ route('admin.progress.create') }}" role="button" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    Create new action
                </a>
                <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">{{ __("Action name") }}</th>
                            <th scope="col">{{ __("Created at") }}</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($actions as $action)
                        <tr>
                            <td>{{ $action->action }}</td>
                            <td>{{ $action->created_at->format('j F, Y') }}</td>
                            <td>
                                <form method="post" action="{{ route('admin.progress.destroy', $action) }}">
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
                {{ $actions->links() }}
            </div>
        </div>
    </div>
@endsection
