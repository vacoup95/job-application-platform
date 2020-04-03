@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Edit note') }}</div>
                    <div class="card-body">
                        <form action="{{ route('note.update', $note) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $note->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">{{ __("Description") }}</label>
                                <textarea class="form-control" name="description" id="description" rows="10">{{ $note->description }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
