@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col-2">
                <div class="card mt-4">
                    <div class="card-header"><h5 class="text-center pb-0 mb-0">{{ __("Users") }}</h5></div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $data['counters']['users'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card mt-4">
                    <div class="card-header"><h5 class="text-center pb-0 mb-0">{{ __("Applications") }}</h5></div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $data['counters']['applications'] }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card mt-4">
                    <div class="card-header"><h5 class="text-center pb-0 mb-0">{{ __("Locations") }}</h5></div>
                    <div class="card-body">
                        <h1 class="text-center">{{ $data['counters']['locations'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <div class="card mt-4">
                    <div class="card-header">{{ __("Set application statuses") }}</div>
                    <div class="card-body">
                        <form action="{{ route('option.save') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="option_to_save" value="ghosted_days" />
                            <div class="form-group">
                                <label class="d-block">{{ __("Ghosted after...") }}</label>
                                <input type="text" name="ghosted_days" class="form-control col-8 d-inline" placeholder="0" value="{{ $data['options']['ghosted_days'] }}" />
                                <div class="col-2 d-inline">
                                    <span class="d-inline"><b>{{ __("days") }}</b></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                        </form>
                        <hr/>
                        <form action="{{ route('option.save') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="option_to_save" value="application_ghosted_status" />
                            <div class="form-group">
                                <label>{{ __("Application ghosted status") }}</label>
                                <select class="custom-select" name="application_ghosted_status">
                                    @if(isset($data['statuses']))
                                        @foreach($data['statuses'] as $app_status)
                                            <option value="{{ $app_status->id }}" {{ $data['options']['application_ghosted_status'] == $app_status->id ? 'selected' : null }}>{{ $app_status->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                        </form>
                        <hr/>
                        <form action="{{ route('option.save') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="option_to_save" value="default_application_status" />
                            <div class="form-group">
                                <label>{{ __("Default application status") }}</label>
                                <select class="custom-select" name="default_application_status">
                                    @if(isset($data['statuses']))
                                        @foreach($data['statuses'] as $app_status)
                                            <option value="{{ $app_status->id }}" {{ $data['options']['default_application_status'] == $app_status->id ? 'selected' : null }}>{{ $app_status->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                        </form>
                        <hr/>
                        <form action="{{ route('option.save') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="option_to_save" value="closed_application_status" />
                            <div class="form-group">
                                <label>{{ __("Application closed status") }}</label>
                                <select class="custom-select" name="closed_application_status">
                                    @if(isset($data['statuses']))
                                        @foreach($data['statuses'] as $app_status)
                                            <option value="{{ $app_status->id }}" {{ $data['options']['closed_application_status'] == $app_status->id ? 'selected' : null }}>{{ $app_status->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                        </form>
                        <hr/>
                        <form action="{{ route('option.save') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="option_to_save" value="open_application_status" />
                            <div class="form-group">
                                <label>{{ __("Application open status") }}</label>
                                <select class="custom-select" name="open_application_status">
                                    @if(isset($data['statuses']))
                                        @foreach($data['statuses'] as $app_status)
                                            <option value="{{ $app_status->id }}" {{ $data['options']['open_application_status'] == $app_status->id ? 'selected' : null }}>{{ $app_status->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Update") }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card mt-4">
                    <div class="card-header">{{ __("Status update event by progress") }}</div>
                    <div class="card-body">
                        <form action="{{ route('admin.action.update', 0) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="option_to_save" value="open_application_status" />
                            <div class="form-row">
                                <div class="col">
                                    <label>{{ __("When progress is added,") }}</label>
                                    <select class="custom-select" name="action_id">
                                        @if(isset($data['progress_actions']))
                                            @foreach($data['progress_actions'] as $action)
                                                <option value="{{ $action->id }}">{{ $action->action }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                 </div>
                                <div class="col">
                                    <label>{{ __("Change status to,") }}</label>
                                    <select class="custom-select" name="status_id">
                                        @if(isset($data['statuses']))
                                            @foreach($data['statuses'] as $app_status)
                                                <option value="{{ $app_status->id }}">{{ $app_status->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary">{{ __("Create event") }}</button>
                            </div>
                        </form>
                        <hr/>
                        <ul class="list-group">
                            @foreach($data['progress_actions']->where('status_id', '!=', null) as $actionEvent)
                                <li class="list-group-item">
                                    If <b>{{ $actionEvent->action }}</b> created
                                    then update status to <b>{{ $data['statuses']->find($actionEvent->status_id)->name }}</b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
