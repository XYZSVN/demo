<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Student;
use App\AccountItem;

class AccountController extends Controller
{
    public function student_profile($id){
        
        $student_info = Student::find($id);
        
        $invoices = Invoice::where('type','=','income')->where('user_id',$id)->get();
        
        return view('admin.pages.students.student_profile',compact('student_info','invoices'));
    }
    public function invoices(){
        
        $invoices = Invoice::all();
        
        return view('admin.pages.account_section.invoices',compact('invoices'));
    }
    
    public function delete_invoice_item($id) {

        $invoice = Invoice::find($id);
        $invoice->delete();
        return back()->with('delete', 'Invoice Item deleted Successfully');
    }
    public function ajax_edit_invoice_item(Request $request) {

        if ($request->ajax()) {
            $id = $request->data;
            $invoice = Invoice::find($id);
            //echo json_decode($info);
            return response()->json($invoice);
        }
   }
   
   public function ajax_update_invoice_item(Request $request){
       
       $all = $request->all();
       
       echo '<pre>';
       print_r($all);
       
   }
   public function edit_student_invoice_item($id){
       
       $invoice_info = Invoice::find($id);
       
       //$account_item_id = $invoice_info->account_item_id;
       
       $account_item_info = AccountItem::where('item_type','=','income')->get();
       
       return view('admin.pages.account_section.ajax_view.invoice_test',compact('invoice_info','account_item_info'));
       
   }
   public function update_invoice_item(Request $request){
       
       $invoice_id = $request->invoice_id;
       
       $invoice_update = Invoice::find($invoice_id);
       
       $invoice_update->account_item_id = $request->account_item_name;
       $invoice_update->status = $request->account_item_status;
       $invoice_update->note = $request->account_item_note;
       
       $invoice_update->save();
       
       return back()->with('success','Updated Successfully');
       
   }
   
   public function each_student_invoice_item_create(Request $request){
       
       if ($request->ajax())
        {
            $account_items = AccountItem::where('item_type','=','income')->get();
            
            view()->share('info',$account_items);
            $view = view('admin.pages.students.students_ajax.ajax_account_items_info');
            $render = $view->render();
            $result['response'] = $render;
            
            return response()->json($result);
        }
   }
   

}
