<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{


    public function __construct()
    {
        $this->middleware(['permission:companies-read'])->only('index');
        $this->middleware(['permission:companies-create'])->only(['create', 'store']);
        $this->middleware(['permission:companies-update'])->only(['update', 'edit']);
        $this->middleware(['permission:companies-delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 10;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';

        $companies = Company::where(function ($query) use ($request) {
            return $query->when($request->search, function ($q) use ($request) {
                return $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        })

            ->when($request->from, function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->from);
            })
            ->when($request->to, function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->to);
            })
            ->orderBy('created_at', $order)
            ->paginate($limit)
            ->withQueryString();


        return view('admin.company.index')->with(\compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255',],
            'email' => ['nullable', 'email', 'unique:companies'],
            'website' => ['nullable', 'url',],
            'logo' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100', 'max:10240'],
        ]);


        $data = $request->only([
            'name',
            'email',
            'website',
        ]);

        $company = Company::create($data);
        if ($request->hasFile('logo')) {
            $oldImage = $request->file('logo');
            $newImage = $request->file('logo')->hashName();
            Image::make($oldImage)->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/companies/') . $newImage, 100);
            $company->logo = $newImage;
        }
        $company->save();

        $request->session()->flash('success',  __('site.CREATED'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //

        return view('admin.company.edit')->with(\compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        //

        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255',],
            'email' => ['nullable', 'email', Rule::unique('companies', 'email')->ignore($company->id)],
            'website' => ['nullable', 'url',],
            'logo' => ['nullable', 'image', 'dimensions:min_width=100,min_height=100', 'max:10240'],
        ]);


        $data = $request->only([
            'name',
            'email',
            'website',
        ]);



        $company->update($data);
        if ($request->hasFile('logo')) {
            if (!is_null($company->logo) && File::exists(storage_path('app/public/companies/' . $company->logo))) {
                Storage::disk('public')->delete('companies/' . $company->logo);
            }
            $oldImage = $request->file('logo');
            $newImage = $request->file('logo')->hashName();
            Image::make($oldImage)->resize(150, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(storage_path('app/public/companies/') . $newImage, 100);
            $company->logo = $newImage;
        }
        $company->save();

        $request->session()->flash('success',  __('site.UPDATED'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Company $company)
    {


        if (!is_null($company->logo) && File::exists(storage_path('app/public/companies/' . $company->logo))) {

            Storage::disk('public')->delete('companies/' . $company->logo);
        }

        $company->delete();
        $request->session()->flash('success',  __('site.DELETED'));

        return redirect()->back();
    }
}
