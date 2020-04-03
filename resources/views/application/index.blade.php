@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
               <ul class="nav">
                   <li class="nav-item">
                       <a class="nav-link active" href="{{ route('application.create') }}">{{ __('Submit new job application') }}</a>
                   </li>
               </ul>
        </div>

        <div class="row mt-3">
            <div class="col">
                @if(isset($applications))
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Brand</th>
                                    <th>Brand name</th>
                                    <th>Role</th>
                                    <th>URL</th>
                                    <th>Resume</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Submitted</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                    <tr class="cursor-pointer" style="height: 130px;" data-href="{{ route('application.show', [$application->id]) }}">
                                        <td style="vertical-align: middle;"><img class="img" src="//logo.clearbit.com/{{ $application->website }}?size=125"></td>
                                        <td>{{ $application->name }}</td>
                                        <td>{{ $application->role }}</td>
                                        <td>{{ $application->application_url }}</td>
                                        <td>{{ $application->resume->name ?? 'No resume selected' }}</td>
                                        <td>{{ $application->status->name ?? null }}</td>
                                        <td>{{ $application->notes->count() }}</td>
                                        <td>{{ $application->application_send_at->format('j F, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
