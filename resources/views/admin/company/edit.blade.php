

@extends('layouts.admin.master')
@section('pageTitle')
{{ __('site.COMPANIES') }}
@endsection
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('site.DASHBOARD') }}</a></li>
      <li class="breadcrumb-item " > <a href="{{ route('admin.companies.index') }}">{{ __('site.COMPANIES') }}</a>  </li>
      <li class="breadcrumb-item active" aria-current="page"> {{__('site.UPDATE')  . ' ' .__('site.COMPANIES') }}  </li>
    </ol>
  </nav>
<div class="card">

    <div class="card-header">
        <h1> {{ __('site.COMPANIES') }}</h1>

    </div>
<div class="card-body">
    <form action="{{ route('admin.companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')


        <div class="row">

            {{-- name --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label  for="name">{{ __('site.NAME') }}</label>
                    <input required type="text" id="name" name="name" value="{{ $company->name }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- name --}}


            {{-- email --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">{{ __('site.EMAIL') }}</label>
                    <input  type="email" id="email" name="email" value="{{ $company->email }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- email --}}

            {{-- website --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="website">{{ __('site.WEBSITE') }}</label>
                    <input   type="text" id="website" name="website" value="{{ $company->website }}" class="form-control @error('website') is-invalid @enderror">
                    @error('website')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- website --}}





            {{-- logo --}}
              <div class="col-md-6">
                <div class="form-group">
                    <label for="logo">{{ __('site.LOGO') }}</label>
                    <input  type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
                    @error('logo')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            {{-- logo --}}






            <div class="col-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{ __('site.UPDATE') }}</button>
                </div>
            </div>

        </div>

    </form>
</div>
</div>



@endsection
