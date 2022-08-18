<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    private $store;
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->store->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->store->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return $store;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $store->update($request->all());

        return $store;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        return $store->delete();
    }
}
