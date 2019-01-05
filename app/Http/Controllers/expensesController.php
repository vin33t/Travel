<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\expenses;
use Carbon\Carbon;
class expensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if ($request->date) {
            $expense = new expenses;
            $expense->date = $request->date;
            $expense->amount = $request->amount;
            $expense->description = $request->description;
            $expense->save();
        }
        $dt = Carbon::now();
        $dt->timezone('Asia/Kolkata');
        $date_today = $dt->timezone('Europe/London');
        $date = $date_today->toDateString();
        // dd($date);
        $expenses = expenses::where('auto',0)->get();
        return view('expenses.index')->with('expenses',$expenses)
                                        ->with('date',$date);
    }

    public function auto(Request $request){
        if ($request->date) {
            $expense = new expenses;
            $expense->date = $request->date;
            $expense->start_date = $request->start_date;
            $expense->end_date = $request->end_date;
            $expense->amount = $request->amount;
            $expense->description = $request->description;
            $expense->auto = 1;
            $expense->save();
        }
        $dt = Carbon::now();
        $dt->timezone('Asia/Kolkata');
        $date_today = $dt->timezone('Europe/London');
        $date = $date_today->toDateString();
        $expenses = expenses::where('auto',1)->get();
        return view('expenses.auto')->with('expenses',$expenses)
                                        ->with('date',$date);
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
        $expense = expenses::find($id);
        $expense->delete();
        return redirect()->route('expenses.get')->with('expenses',expenses::all());
    }
}