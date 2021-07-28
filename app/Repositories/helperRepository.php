<?php
namespace App\Repositories;

use App\Models\invoicenumber;
use Carbon\Carbon;

class helperRepository{

    public function getinvoicenumber($id){
        $invoice = invoicenumber::first();
        $number = 1;
        if(is_null($invoice)){
            invoicenumber::create(['inv'=>1]);
        }else{
            $number = $invoice->inv;
            $invoice->inv = $number+1;
            $invoice->save();
        }
        return 'inv'.Carbon::now()->year."".Carbon::now()->month."".Carbon::now()->day."".$id.''.$number;
    }

    public function getreceiptnumber($id){
        $invoice = invoicenumber::first();
        $number = 1;
        if(is_null($invoice)){
            invoicenumber::create(['inv'=>1]);
        }else{
            $number = $invoice->inv;
            $invoice->inv = $number+1;
            $invoice->save();
        }
        return 'rpt'.Carbon::now()->year."".Carbon::now()->month."".Carbon::now()->day."".$id.''.$number;
    }


    
}