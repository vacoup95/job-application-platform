@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-6 d-inline">
                <form action="{{ route('progress.destroy', [$progress->id]) }}" class="d-inline" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="text-black-50 fas fa-trash"></i></button>
                </form>
                <p class="d-inline ml-3 align-bottom">Method of communication: {{ strtolower($progress->communicationMethod()->name) }}</p>
                <div class="alert alert-dark mt-3" role="alert">
                    {{ __($progress->type()) }}
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">{{ __('Notes') }}</div>
                    <div class="card-body">
                        @foreach($notes as $note)
                            <div class="row mb-3">
                                <div class="col-10">
                                    <span><b>{{ $note->name }}</b></span>
                                    <p class="mt-1 mb-0 pb-0">{{ $note->description }}</p>
                                    <span class="badge pl-0 ml-0">{{ $note->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="col-2">
                                    <form action="{{ route('note.destroy', [$note->id]) }}"
                                          id="noteDestroy{{$note->id}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <i role="button"
                                           onclick="document.getElementById('noteDestroy{{$note->id}}').submit();"
                                           class="text-black-50 fas fa-trash"></i>
                                    </form>
                                    <a href="{{ route('note.edit', $note) }}" class="text-black-50"><i class="fas fa-edit"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="offset-6 col-6">
                <div class="card">
                    <div class="card-header">{{ __('Create note') }}</div>
                    <div class="card-body">
                        <form action="{{ route('note.store', ['notable_id' => $progress->id, 'notable_type' => get_class($progress)]) }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="inputName">{{ __('Title') }}</label>
                                <input type="text" name="name" class="form-control" id="inputName"
                                       aria-describedby="nameHelp" placeholder="{{ __('Choose title') }}">
                                <small id="emailHelp" class="form-text text-muted">Create a fitting title for
                                    this note.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="formBody">{{ __('Description') }}</label>
                                <textarea class="form-control" id="formBody" name="description"
                                          rows="8"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
