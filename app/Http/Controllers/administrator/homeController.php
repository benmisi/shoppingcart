<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Repositories\administrator\ordersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
class homeController extends Controller
{
   
    private $orders;
    

    public function __construct(ordersRepository $orders)
    {
        $this->middleware('auth:admin');
        $this->orders =$orders;
    }
    public function index()
    {
        $data = $this->orders->getList();
        $orders = $data->groupBy('status');
        $awaiting = Arr::exists($orders,"AWAITING") ? count($orders['AWAITING']) : 0;
        $pending = Arr::exists($orders,"PENDING") ? count($orders['PENDING']) : 0;
        $delivered  =  Arr::exists($orders,"DELIVERED") ? count($orders['DELIVERED']) : 0;
        $cancelled =Arr::exists($orders,"CANCELLED") ? count($orders['CANCELLED']) : 0;
        return view('administrator.home',compact('awaiting','pending','delivered','cancelled'));
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
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
