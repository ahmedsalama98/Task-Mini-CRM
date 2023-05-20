@extends('layouts.admin.master')

@section('pageTitle')
    {{ __('site.COMPANIES') }}
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"> {{ __('site.COMPANIES') }}</li>
        </ol>
    </nav>
    <div class="row justify-content-between">
        <div class="col-auto">
            <h2> {{ __('site.COMPANIES') }} </h2>
        </div>

        <div class="col-auto">

            @if (Auth::user()->hasPermission('companies-create'))
                <a class="btn btn-success " href="{{ route('admin.companies.create') }}">{{ __('site.CREATE') }}</a>
            @else
                <button class="btn btn-success disabled">{{ __('site.CREATE') }}</button>
            @endif
        </div>
    </div>

    <div class="card ">
        <div class="card-header">

            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ __('site.SEARCH') }}

                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">

                            <form action="{{ route('admin.companies.index') }}" <div class="row">
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="search"> {{ __('site.SEARCH') }}</label>
                                        <input type="text" id="search" value="{{ request()->search }}" name="search"
                                            class="form-control search-docs" placeholder=" {{ __('site.SEARCH') }}">
                                    </div>
                                </div>



                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <label for="limit"> {{ __('site.LIMIT') }}</label>

                                        <select class="form-control" aria-label="Default" name="limit">
                                            <option selected value="5">5</option>
                                            <option value="10" @if (isset(request()->limit) && request()->limit == 10) selected @endif>10
                                            </option>
                                            <option value="20" @if (isset(request()->limit) && request()->limit == 20) selected @endif>20
                                            </option>
                                            <option value="30" @if (isset(request()->limit) && request()->limit == 30) selected @endif>30
                                            </option>
                                            <option value="40" @if (isset(request()->limit) && request()->limit == 40) selected @endif>40
                                            </option>
                                            <option value="50" @if (isset(request()->limit) && request()->limit == 50) selected @endif>50
                                            </option>
                                            <option value="100" @if (isset(request()->limit) && request()->limit == 100) selected @endif>100
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="order"> {{ __('site.ORDER_BY') }}</label>
                                        <select class="form-control" aria-label="Default" name="order">
                                            <option selected value="DESC"> {{ __('site.LATEST') }}</option>
                                            <option value="ASC" @if (isset(request()->order) && request()->order == 'ASC') selected @endif>
                                                {{ __('site.OLDEST') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="from"> {{ __('site.FROM') }}</label>
                                        <input type="date" id="from" value="{{ request()->from }}" name="from"
                                            class="form-control search-docs" placeholder=" {{ __('site.FROM') }}">

                                    </div>
                                </div>


                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="to"> {{ __('site.TO') }}</label>

                                        <input type="date" id="to"
                                            value="{{ request()->to ? request()->to : date('Y-m-d', time()) }}"
                                            name="to" class="form-control search-docs" placeholder=" {{ __('site.TO') }}">

                                    </div>
                                </div>


                                <div class="col-12">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success "> {{ __('site.SEARCH') }}</button>
                                    </div>
                                </div>








                            </form>

                        </div>
                    </div>
                </div>


            </div>





        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-hover p-8">
                    <thead>
                        <tr>
                            <th class="cell">ID</th>
                            <th class="cell">{{ __('site.LOGO') }}</th>
                            <th class="cell">{{ __('site.NAME') }}</th>
                            <th class="cell">{{ __('site.EMAIL') }}</th>
                            <th class="cell">{{ __('site.SITE') }}</th>
                            <th class="cell">{{ __('site.CREATED_AT') }}</th>
                            <th class="cell">{{ __('site.ACTIONS') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($companies as $company)
                            <tr>
                                <td class="cell">{{ $company->id }}</td>

                                <td class="cell">
                                    <img src="{{ $company->logo_url }}" alt="aveter" class='d-block  dashboard-avatar '>
                                </td>
                                <td class="cell">{{ $company->name }}</td>

                                <td class="cell">{{ $company->email }}</td>
                                <td class="cell">{{ $company->phone }}</td>






                                <td class="cell">{{ $company->created_at->format('d M Y  h:i A') }}</td>

                                <td class="cell">

                                    @if (Auth::user()->hasPermission('companies-update'))
                                        <a class="btn btn-primary "
                                            href="{{ route('admin.companies.edit', $company->id) }}"><i
                                                class="far fa-edit"></i></a>
                                    @else
                                        <button class="btn btn-primary disabled"><i class="far fa-edit"></i></button>
                                    @endif


                                    @if (Auth::user()->hasPermission('companies-delete'))
                                        <form class="d-inline-block delete-btn"
                                            action="{{ route('admin.companies.destroy', $company->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger " type="submit"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    @else
                                        <button class="btn btn-danger disabled"><i class="fas fa-trash-alt"></i></button>
                                    @endif




                                </td>
                            </tr>
                        @endforeach


                        @if ($companies->count() < 1)
                            <tr>
                                <td colspan="10">
                                    <p class="text-center p-10"> {{ __('site.EMPTY') }}</p>
                                </td>
                            </tr>
                        @endif




                    </tbody>
                </table>


                <div class="row align-items-center justify-content-between align-content-center">
                    <div class="col-auto">

                        {!! $companies->appends(request()->query())->links('pagination::bootstrap-4') !!}
                    </div>




                </div>
            </div>
        </div>

    </div>
@endsection
