<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:employees-read'])->only('index');
        $this->middleware(['permission:employees-create'])->only(['create', 'store']);
        $this->middleware(['permission:employees-update'])->only(['update', 'edit']);
        $this->middleware(['permission:employees-delete'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 10;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';

        $employees = Employee::where(function ($query) use ($request) {
            return $query->when($request->search, function ($q) use ($request) {
                return $q->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%');
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


        return view('admin.employee.index')->with(\compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $companies =  Company::all();

        return view('admin.employee.create')->with(\compact('companies'));;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:255',],
            'last_name' => ['required', 'string', 'min:2', 'max:255',],
            'email' => ['nullable', 'email', 'unique:employees'],
            'phone' => ['nullable', 'numeric',  'unique:employees'],
            'company_id' => ['nullable', 'numeric', 'exists:companies,id'],
        ]);


        $data = $request->only([
            'first_name',
            'last_name',
            'phone',
            'email',
            'company_id',
        ]);

        $employee = Employee::create($data);


        $request->session()->flash('success',  __('site.CREATED'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
        $companies =  Company::all();

        return view('admin.employee.edit')->with(\compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        //




        $request->validate([
            'first_name' => ['required', 'string', 'min:2', 'max:255',],
            'last_name' => ['required', 'string', 'min:2', 'max:255',],
            'email' => ['nullable', 'email', Rule::unique('employees', 'email')->ignore($employee->id)],
            'phone' => ['nullable', 'numeric',  Rule::unique('employees', 'phone')->ignore($employee->id)],
            'company_id' => ['nullable', 'numeric', 'exists:companies,id'],
        ]);


        $data = $request->only([
            'first_name',
            'last_name',
            'phone',
            'email',
            'company_id',
        ]);

        $employee->update($data);


        $request->session()->flash('success',  __('site.UPDATED'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Employee $employee)
    {

        $employee->delete();
        $request->session()->flash('success',  __('site.DELETED'));

        return redirect()->back();
    }
}
