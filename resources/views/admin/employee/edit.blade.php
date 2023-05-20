@extends('layouts.admin.master')
@section('pageTitle')
    {{ __('site.EMPLOYEES') }}
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('site.DASHBOARD') }}</a></li>
            <li class="breadcrumb-item "> <a href="{{ route('admin.employees.index') }}">{{ __('site.EMPLOYEES') }}</a> </li>
            <li class="breadcrumb-item active" aria-current="page"> {{ __('site.UPDATE') . ' ' . __('site.EMPLOYEES') }} </li>
        </ol>
    </nav>
    <div class="card">

        <div class="card-header">
            <h1> {{ __('site.EMPLOYEES') }}</h1>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="row">

                    {{-- first_name --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">{{ __('site.FIRST_NAME') }}</label>
                            <input required type="text" id="first_name" name="first_name" value="{{ $employee->first_name }}"
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
                            <input required type="text" id="last_name" name="last_name" value="{{ $employee->last_name }}"
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
                            <input type="email" id="email" name="email" value="{{$employee->email }}"
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
                            <input type="number" id="phone" name="phone" value="{{ $employee->phone }}"
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
                                        {{ $employee->company_id == $company->id ? 'selected' : '' }}>
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
                            <button type="submit" class="btn btn-primary">{{ __('site.UPDATE') }}</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
