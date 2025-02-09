@extends('layouts.app')

@section('content')

<h1>Settings</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @include('includes.message')
            <div class="card">
                <div class="card-header">{{ __('Upload Image') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                        <?php //enctype="multipart/form-data" permite procesar imagenes?>
                        @csrf

                        <div class="row mb-3">
                            <label for="image_path" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path"  required autofocus>

                                @error('image_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Post now') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
