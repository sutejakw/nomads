<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// panggil form request travel package
use App\Http\Requests\Admin\TransactionRequest;
// panggil model Transaction
Use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // memanggil semua relasi di model Sransaction
        $items = Transaction::with([
            'details', 'travel_package', 'user'
        ])->get();
        
        return view('pages.admin.transaction.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Transaction::create($data);
        return redirect()->route('transaction.index')->with('status', 'Insert Successfuly!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Transaction::with([
            'details', 'travel_package', 'user'
        ])->findOrFail($id);

        return view('pages.admin.transaction.detail', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get data dari tbl transaction berdasarkan id
        $item = Transaction::findOrFail($id);

        return view('pages.admin.transaction.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $data = $request->all();
        // $data['slug'] = Str::slug($request->title);

        $item = Transaction::findOrFail($id);

        $item->update($data);

        return redirect()->route('transaction.index')->with('status', 'Update Successfuly!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();

        return redirect()->route('transaction.index')->with('status', 'Delete Successfuly!');;
    }
}
