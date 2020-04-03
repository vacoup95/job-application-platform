@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>{{ __("Create new status") }}</h2>
                <div class="card mt-4">
                    <div class="card-header">Create new status</div>
                    <div class="card-body">
                        <form action="{{ route('admin.status.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label>{{ __("Name") }}</label>
                                <input type="text" name="name" class="form-control" autocomplete="off" placeholder="{{ __("Application submitted") }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __("Description") }}</label>
                                <input type="text" name="description" class="form-control" autocomplete="off" placeholder="{{ __("The default") }}">
                            </div>
                            <div class="form-group">
                                <label>{{ __("Bootstrap button class") }}</label>
                                <input type="text" name="btn_class" class="form-control" autocomplete="off" placeholder="{{ __("btn-primary") }}">
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
