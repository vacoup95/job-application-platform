@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Upload new Resume</div>
                    <div class="card-body">
                        <form action="{{ route('resume.store') }}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nameInput">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameInput" placeholder="Informal style CV">
                                        @error('name')
                                        <span class=”invalid-feedback” role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nameInput">Upload a resume</label>
                                        <div class="custom-file">
                                            <input type="file" name="resume" class="custom-file-input @error('resume') is-invalid @enderror" id="resumeFile">
                                            <label class="custom-file-label" for="resumeFile">Select file</label>
                                        </div>
                                        @error('resume')
                                        <span class=”invalid-feedback” role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">Resumes</div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>CV</td>
                                <td>Delete</td>
                            </tr>
                            @if(isset($resumes))
                                @foreach($resumes as $resume)
                                    <tr>
                                        <td>
                                            <a href="{{ asset($resume->file) }}">{{ $resume->name ?? 'Resume' }}</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('resume.destroy', [$resume->id]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="reset-button">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
