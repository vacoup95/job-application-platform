@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>{{ __("Communication Methods") }}</h2>
                <p>{{ __("Table underneath shows the current collection of communication methods used by applicants to indicate which form communication they used, this is useful when you need to retrieve some data later regarding a specific moment. By using the buttons you can also add new communication methods.") }}</p>

                <a href="{{ route('admin.communication.create') }}" role="button" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    Create method
                </a>
                <table class="table mt-3">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($communications as $method)
                        <tr>
                            <td>{{ $method->name }}</td>
                            <td>{{ $method->description }}</td>
                            <td>
                                <form method="post" action="{{ route('admin.communication.destroy', $method) }}">
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
                {{ $communications->links() }}
            </div>
        </div>
    </div>
@endsection
