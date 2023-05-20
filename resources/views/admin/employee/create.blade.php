@extends('layouts.admin.master')
@section('pageTitle')
    {{ __('site.EMPLOYEES') }}
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('site.DASHBOARD') }}</a></li>
            <li class="breadcrumb-item "> <a href="{{ route('admin.employees.index') }}">{{ __('site.EMPLOYEES') }}</a> </li>
            <li class="breadcrumb-item active" aria-current="page"> {{ __('site.CREATE') . ' ' . __('site.EMPLOYEES') }} </li>
        </ol>
    </nav>
    <div class="card">

        <div class="card-header">
            <h1> {{ __('site.EMPLOYEES') }}</h1>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.employees.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')


                <div class="row">

                    {{-- first_name --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">{{ __('site.FIRST_NAME') }}</label>
                            <input required type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                class="form-control @error('first_name') is-invalid @enderror">
                            @error('first_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- first_name --}}


                    {{-- last_name --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">{{ __('site.LAST_NAME') }}</label>
                            <input required type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                class="form-control @error('last_name') is-invalid @enderror">
                            @error('last_name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- last_name --}}


                    {{-- email --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">{{ __('site.EMAIL') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- email --}}

                    {{-- phone --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">{{ __('site.PHONE') }}</label>
                            <input type="number" id="phone" name="phone" value="{{ old('phone') }}"
                                class="form-control @error('phone') is-invalid @enderror">
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- phone --}}


                    {{-- company_id --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_id">Category</label>

                            <select name="company_id" id="company_id"
                                class="form-control @error('company_id') is-invalid @enderror">

                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}"
                                        {{ old('company_id') == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- company_id --}}







                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ __('site.CREATE') }}</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
