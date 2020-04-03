@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Edit your profile settings') }}</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', ['profile' => $user->id]) }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <div class="col">
                                    <label for="name">{{ __('Name') }}</label>
                                </div>

                                <div class="col-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label for="address">{{ __('Street + House number') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="col-8">
                                            <input id="street" type="text" class="form-control @error('address') is-invalid @enderror" name="street" value="{{ $location->street ?? null }}" placeholder="{{ __("Alphagate Drive") }}" required>
                                        </div>
                                        <div class="col">
                                            <input id="street_number" type="text" class="form-control @error('address') is-invalid @enderror" name="street_number" value="{{ $location->street_number ?? null}}" placeholder="{{ __("18") }}" required>
                                        </div>
                                    </div>
                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @error('street_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label for="address">{{ __('City & Zipcode') }}</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="col-6">
                                            <input id="city" type="text" class="form-control @error('address') is-invalid @enderror" name="city" value="{{ $location->city ?? null }}" placeholder="{{ __("Amsterdam") }}" required>
                                        </div>
                                        <div class="col">
                                            <input id="zipcode" type="text" class="form-control @error('address') is-invalid @enderror" name="zipcode" value="{{ $location->zipcode ?? null }}" placeholder="{{ __("1337TI") }}" required>
                                        </div>
                                    </div>
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
