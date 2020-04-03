@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <h2>{{ __("Create new communication method") }}</h2>
                <div class="card mt-4">
                    <div class="card-header">Create new communication method</div>
                    <div class="card-body">
                        <form action="{{ route('admin.communication.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="companyInput">{{ __("Name") }}</label>
                                <input type="text" name="name" class="form-control" autocomplete="off" placeholder="{{ __("Phone") }}">
                            </div>
                            <div class="form-group">
                                <label for="companyInput">{{ __("Description") }}</label>
                                <input type="text" name="description" class="form-control" autocomplete="off" placeholder="{{ __("Invented in 1876 still in use today") }}">
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
