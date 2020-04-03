@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>{{ __("Create new progress action") }}</h2>
                <div class="card mt-4">
                    <div class="card-header">Create new progress action</div>
                    <div class="card-body">
                        <form action="{{ route('admin.progress.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>{{ __("Action") }}</label>
                                <input type="text" name="action" class="form-control" autocomplete="off" placeholder="{{ __("Received assessment") }}">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Create") }}</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
