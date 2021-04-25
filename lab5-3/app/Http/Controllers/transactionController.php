<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class transactionController extends Controller
{
    //
    public function list($id){
        $title="Transaction";
        $transactions = DB:: table("transaction")
        ->where('transaction_from',$id)
        ->orwhere('transaction_to',$id)->get();
        return view("transaction.tlist",["transactions"=>$transactions,"title"=>$title]);
    }
    public function dotransaction(Request $request){
        $title="Transaction";
        $result=DB::transaction(function() use ($request){
            $sender = DB:: table("account")->where("account_number",$request->from)->get()->first();
            $reciever = DB:: table("account")->where("account_number",$request->to)->get()->first();
            if($sender === null or $reciever===null){
                return array("please check ur account number on sending to and receiving","danger");
            }
            else{
                if($sender->account_balance>=$request->amount){
                    DB::table('account')
                    ->where('id', $sender->id)
                    ->update(['account_balance' =>($sender->account_balance-$request->amount)]);
                    DB::table('account')
                    ->where('id', $reciever->id)
                    ->update(['account_balance' =>($reciever->account_balance+$request->amount)]);
                    DB::insert("INSERT INTO `transaction`( `transaction_from`, `transaction_to`, `amount`, `tranaction_description`, `created_at`) VALUES (?,?,?,?,now())",
                    [$request->from,$request->to,$request->amount,$request->desc]);
                    return array("Success","success");
            
                }else{
                    return array("ur account balance is not enough","warning");
                }
            }
        });
        return view('transaction.transaction',["title"=>$title,"result"=>$result]);
    }

}
