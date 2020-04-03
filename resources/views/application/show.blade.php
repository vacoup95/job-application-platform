@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col">
                    <div class="alert {{ $status->btn_class }}" role="alert">
                        <h4 class="alert-heading">{{ __($status->name) }}</h4>
                        <hr>
                        <p class="mb-0">{{ __($status->description) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="grid">
                    <div class="col grid-item">
                        <form id="updateCompanyStatusForm" action="{{ route('application.update', $application) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="btn-group" data-toggle="buttons">
                                @foreach($statuses as $status)
                                    <label class="btn {{ $status->btn_class }}">
                                        {{ $status->name }}
                                        <input type="radio" value="{{ $status->id }}" class="radio-hide" onclick="this.form.submit()" name="status_id">
                                    </label>
                                @endforeach
                            </div>
                        </form>
                    </div>
                    <div class="col-6 grid-item">
                        <div class="card">
                            <div class="card-header font-weight-bold text-center">{{ $application->name }}</div>
                            <div class="card-body">
                                <img class="img" src="//logo.clearbit.com/{{ $application->website }}?size=200">
                            </div>
                        </div>
                    </div>
                    <div class="col-6 grid-item">
                        <div class="card">
                            <div class="card-header">{{ __('Application') }}</div>
                            <div class="card-body">
                                {{ __('Role: ') }} <b>{{ $application->role }}</b><br/>
                                {{ __('Application: ') }} <b><a href="{{ $application->application_url ?? null }}">Visit</a></b><br/>
                                @if($resume)
                                    {{ __('Resume: ') }} <b><a href="{{ asset($resume->file) }}">{{ $resume->name ?? 'Resume' }}</a></b><br/>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-12 grid-item">
                        <div class="card">
                            <div class="card-header">{{ __('Create note') }}</div>
                            <div class="card-body">
                                    <form action="{{ route('note.store', ['notable_id' => $application->id, 'notable_type' => get_class($application)]) }}" method="post">
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
                    <div class="col-12 grid-item">
                        <div class="card">
                            <div class="card-header">{{ __('Enter progress') }}</div>
                            <div class="card-body">
                                <form action="{{ route('progress.store', ['application_id' => $application]) }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="dropdownCommunicationMethod">{{ __('Communication method') }}</label>
                                        <select class="form-control" name="communication_method_id"
                                                id="dropdownCommunicationMethod">
                                            @foreach($communicationMethods as $method)
                                                <option value="{{ $method->id }}">{{ __($method->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="formBody">{{ __('Action') }}</label>
                                        <select class="form-control" name="action_id">
                                            @foreach($actions as $action)
                                                <option value="{{ $action->id }}">{{ __($action->action) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="grid">
                    <div class="col-12 grid-item">
                        <div class="card">
                            <div class="card-header">{{ __('Progress') }}</div>
                            <div class="card-body">
                                <ul class="list-group">
                                    @foreach($progresses as $progress)
                                        <li class="list-group-item cursor-pointer" data-href="{{ route('progress.show', $progress) }}">
                                            <b>{{ __($progress->communicationMethod()->name) }}</b>
                                            {{ __($progress->type()) }}<br/>
                                            <span class="badge pl-0 ml-0">{{ $progress->created_at->diffForHumans() }}</span>
                                            @if($progress->notes()->count())
                                                <span class="badge badge-primary badge-pill">{{ $progress->notes()->count() }}</span>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 grid-item">
                        <div class="card">
                            <div class="card-header">{{ __('Notes') }}</div>
                            <div class="card-body">
                                @foreach($notes as $note)
                                    <div class="row mb-3">
                                        <div class="col-10">
                                            <span><b>{{ $note->name }}</b></span>
                                            <p class="mt-1 mb-0">{{ $note->description }}</p>
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
                    @if(isset($motivation->description))
                        <div class="col-12 grid-item">
                            <div class="card">
                                <div class="card-header">{{ __('Motivation') }}</div>
                                <div class="card-body">
                                    {!! nl2br($motivation->description) !!}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
