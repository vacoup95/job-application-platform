@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Submit new application</div>
                    <div class="card-body">
                        <form action="{{ route('application.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="companyInput">{{ __("Application") }}</label>
                                <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" id="companyInput" placeholder="VodafoneZiggo" value="{{ old('company') }}">
                                @error('company')
                                <span class=”invalid-feedback” role=”alert”>
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="companyInput">{{ __("Company website") }}</label>
                                <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" placeholder="http://example.com" value="{{ old('website') }}">
                                @error('website')
                                <span class=”invalid-feedback” role=”alert”>
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="roleInput">{{ __("Role") }}</label>
                                <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" id="roleInput" placeholder="Laravel Developer" value="{{ old('role') }}">
                                @error('role')
                                <span class=”invalid-feedback” role=”alert”>
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="applicationUrlInput">{{ __("Application URL") }}</label>
                                <input type="text" name="applicationUrl" class="form-control @error('applicationUrl') is-invalid @enderror" id="applicationUrlInput" placeholder="www.example.com/application/backend-developer" value="{{ old('applicationUrl') }}">
                                @error('applicationUrl')
                                <span class=”invalid-feedback” role=”alert”>
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="resumeDropdown">{{ __("Resume") }}</label>
                                <select class="custom-select @error('resume') is-invalid @enderror" id="resumeDropdown" name="resume_id">
                                    <option selected>Select the used resume</option>
                                    @if(isset($resumes))
                                        @foreach($resumes as $resume)
                                            <option value="{{ $resume->id }}">{{ $resume->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('resume')
                                <span class=”invalid-feedback” role=”alert”>
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="form-group col-3">
                                    <label for="street">{{ __("Street") }}</label>
                                    <input type="text" name="street" class="form-control @error('street') is-invalid @enderror" placeholder="Cambronsestraat" value="{{ old('street') }}">
                                    @error('street')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-2">
                                    <label for="street_number">{{ __("Street number") }}</label>
                                    <input type="text" name="street_number" class="form-control @error('street_number') is-invalid @enderror" placeholder="19" value="{{ old('street_number') }}">
                                    @error('street_number')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-3">
                                    <label for="zipcode">{{ __("Postalcode") }}</label>
                                    <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" placeholder="6226TK" value="{{ old('zipcode') }}">
                                    @error('zipcode')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-4">
                                    <label for="city">{{ __("City") }}</label>
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" placeholder="Amsterdam" value="{{ old('city') }}">
                                    @error('city')
                                    <span class=”invalid-feedback” role=”alert”>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="motivationalTextarea">{{ __("Motivational letter") }}</label>
                                <textarea class="form-control @error('motivation') is-invalid @enderror" name="motivation" id="motivationalTextarea" rows="10">{{ old('moviation') }}</textarea>
                                @error('motivation')
                                <span class=”invalid-feedback” role=”alert”>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="submissionDateInput">{{ __("Submission date") }}</label>
                                <input type="text" name="submissionDate" class="form-control @error('submissionDate') is-invalid @enderror" id="submissionDateInput"
                                       aria-describedby="submissionDateHelp" value="{{ old('submissionDate') }}" placeholder="02-10-2020">
                                <small id="submissionDateHelp" class="form-text text-muted">Please use the dd-mm-yyyy date format</small>
                                @error('submissionDate')
                                <span class=”invalid-feedback” role=”alert”>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="communicationMethodDropdown">{{ __("Communication method") }}</label>
                                <select class="custom-select @error('communicationMethod') is-invalid @enderror" name="communicationMethod">
                                    <option selected>{{ __("Select communication method") }}</option>
                                    @if(isset($communicationMethods))
                                        @foreach($communicationMethods as $method)
                                            <option value="{{ $method->id }}">{{ $method->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('communicationMethod')
                                <span class=”invalid-feedback” role=”alert”>
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
