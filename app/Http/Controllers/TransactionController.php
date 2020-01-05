<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Alert;
use PDF;

class TransactionController extends Controller
{
    public function index(){
        $transaction = Transaction::groupBy('code')->orderBy('id','DESC')->get();
        return view('admin.transaction.index',compact('transaction'));
    }

    public function status($code,$status){
        if($status == 0){
            $change = '1';
            
        }else{
            $change = '0';
        }
        $transaction = Transaction::where('code',$code)->pluck('id')->toArray();
        Transaction::whereIn('id',$transaction)->update(['status' => $change]);
        return redirect(route('transaction.index'))->with('success', 'Status changed!');
    }
    public function detail($code){
        $transaction = Transaction::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
        $transactionDetail = Transaction::orderBy('id','DESC')->where('code',$code)->get();
        return view('admin/transaction/detail',compact('transaction','transactionDetail'));
    }
    
    public function cetakpdf($code){
        $data['transaction'] = Transaction::groupBy('code')->orderBy('id','DESC')->where('code',$code)->first();
        $data['transactionDetail'] = Transaction::orderBy('id','DESC')->where('code',$code)->get();
        $pdf = PDF::loadView('admin.transaction.cetakpdf', $data);
        return $pdf->download('admin.transaction.pdf');
    }
}
