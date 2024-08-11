<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments=Payment::all();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $enrollments=Enrollment::pluck('enroll_no','id');
        return view('payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input=$request->all();
        Payment::create($input);
        return redirect()->route('payments.index')->with('success','Payments added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $payment=Payment::findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $payment=Payment::findOrFail($id);
        $enrollments=Enrollment::pluck('enroll_no','id');
        return view('payments.edit', compact('payment','enrollments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $payment=Payment::findOrFail($id);
        $input=$request->all();
        $payment->update($input);
        return redirect()->route('payments.index')->with('success','Payment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $payment=Payment::findOrFail($id);
        $payment->delete();
        return redirect()->route('payments.index')->with('success','Payment Deleted');
    }
}
