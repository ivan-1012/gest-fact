<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\TypeDocument;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::select('customers.id', DB::raw('CONCAT(customers.first_name, " ", customers.last_name) AS full_name'), 'type_documents.name_document','customers.id_type','customers.document', 'customers.phone','customers.email')
        ->join('type_documents', 'customers.id_type', '=', 'type_documents.id')
        ->orderBy('customers.id', 'ASC')
        ->paginate(10);

        return view('customer.index', compact('customer'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_document = TypeDocument::pluck('name_document', 'id');
        return view('customer.create', compact('type_document'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customers = new Customer;
        $customers->first_name = $request->get('nombre');
        $customers->last_name = $request->get('apellido');
        $customers->id_type = $request->get('tipo_documento');
        $customers->document = $request->get('documento_identidad');   
        $customers->phone = $request->get('telefono');
        $customers->email = $request->get('email');
        
        $customers->save();
        return Redirect::to('clientes')->with('success', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_document = TypeDocument::pluck('name_document', 'id');
        $customer = Customer::findOrFail($id);
        return view("customer.edit", ["customer" => $customer , "type_document" => $type_document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customers = Customer::findOrFail($id);
        $customers->first_name = $request->get('nombre');
        $customers->last_name = $request->get('apellido');
        $customers->id_type = $request->get('tipo_documento');
        $customers->document = $request->get('documento_identidad');
        $customers->email = $request->get('email');
        $customers->phone = $request->get('telefono');

        $customers->update();
        return Redirect::to('clientes')->with('success', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return Redirect::to('clientes')->with('success', 'Cliente eliminado correctamente');
    }
}