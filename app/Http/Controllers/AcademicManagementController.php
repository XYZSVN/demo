<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClassName;
use App\Fee;
use App\Student;
use App\HeadItem;
use App\AccountItem;
use App\Invoice;

class AcademicManagementController extends Controller {

    public function class_management() {
        $classes = ClassName::all();
        return view('admin.pages.academic_management.class_management', compact('classes'));
    }

    public function add_class(Request $request) {
        $class = new ClassName;
        $class->class_name = $request->class_name;
        $class->save();
        return redirect('/class-management')->with('success', 'Successfully addes new Class');
    }

    public function ajax_edit_view(Request $request) {
        if ($request->ajax()) {
            $id = $request->id;
            $class = ClassName::find($id);


            $html = '<input type = "text" name = "class_name" class = "form-control" value = "' . $class->class_name . '" >
                    <input name="id" type="hidden" value="'.$class->id.'"/>';
            $info['res']=$html;
            return response()->json($info);
        }
    }
    public function update_class(Request $request)
    {
            $id = $request->id;
            $class = ClassName::find($id);
            $class->class_name=$request->class_name;
            $class->save();
            return back()->with('success', 'Class updated Successfully');
    }
    public function delete_class(Request $request)
    {
            $id = $request->id;
            $class = ClassName::find($id);
            $class->delete();
            return back()->with('delete', 'Class deleted Successfully');

    }
    public function test() {
        
//            $id = $request->id;
            $data = ClassName::find(3);
            $info =array( 
                  'name' => '<input type = "text" name = "class_name" class = "form-control" value = "' . $data->class_name . '" >',
                );
//            echo $info;        
            
            return response()->json($info);
            
    }
    
    public function account_settings(){
        
        $all_head_items = HeadItem::all();
        $all_account_items = AccountItem::all();
        $all_class_name = ClassName::all();
        
        $assign_student_items = AccountItem::where('item_type','=','income')->get();
        
//        echo'<pre>';
//        print_r($assign_student_items);
//        exit();
        
        return view('admin.pages.account_section.account_settings', compact('all_head_items','all_account_items','assign_student_items','all_class_name'));
    }
    
    public function save_new_head(Request $request){
        
        //$input = $request->all();
        
        $head_item = new HeadItem;
        
        $head_item->head_name = $request->head_name;
        $head_item->head_category = $request->head_category;
        
        $head_item->save();
        
        return back()->with('success','Successfully Saved Head Item');
        
    }
    
//    public function ajax_view_head_item(Request $request) {
//        if ($request->ajax()) {
//            $id = $request->id;
//            $class = HeadItem::find($id);
//
//            $html = '<input type = "text"class = "form-control" disabled value = "' . $class->head_name . '" >
//                    <input name="id" class = "form-control" disabled type="text" value="' . $class->head_category . '"/>';
//            $info['res'] = $html;
//            return response()->json($info);
//        }
//    }

    public function ajax_view_head_item(Request $request){
        
        if ($request->ajax()) {
            $id = $request->id;
            $info = HeadItem::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
        
    }
    public function ajax_edit_head_item(Request $request){
        
        if ($request->ajax()) {
            $id = $request->id;
            $info = HeadItem::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
        
    }
    
    public function ajax_update_head_item(Request $request){
        
        $id = $request->head_id;
        $result = HeadItem::find($id);
        $result->head_name = $request->head_name;
        $result->save();
        
        return back()->with('success','Successfully Updated Head Item');
        
//        if ($request->ajax()) {
//            $id = $request->id;
//            $info = HeadItem::find($id);
//            //echo json_decode($info);
//            return response()->json($info);
//        }
        
    }
    
    public function ajax_delete_head_item(Request $request){
        if ($request->ajax()) {
            $id = $request->id;
            $info = HeadItem::find($id);
            //echo json_decode($info);
            return response()->json($info);
        }
    }

        public function delete_head_item(Request $request){
        
        $id = $request->id;
        $result = HeadItem::find($id);
        
        $result->delete();
        return back()->with('delete', 'Head Item deleted Successfully');
    }

    

    public function add_fees(){
        
        return view('admin.pages.account_section.add_fees');
    }
    
    public function save_fees(Request $request){
        
        $fee = new Fee;
        
        $fee->fee_title = $request->fee_title;
        $fee->fee_amount = $request->fee_amount;
        
        $fee->save();
        
        return back()->with('success', 'Created New Fee Successfully');
    }
    
    public function invoice_generate(){
        
        $class = ClassName::all();
        
        $fee = Fee::all();
        
        $data['class']= $class;
        $data['fee']= $fee;
        
        return view('admin.pages.account_section.invoice_generate')->with($data);
    }
    
    public function generate_invoice(Request $request){
        
        $input = $request->all();
        
        echo '<pre>';
        print_r($input);
        
    }
    
    public function account_head_selection(Request $request){
        
        if ($request->ajax()) {
            $head_category = $request->id;
            $head_items = HeadItem::where('head_category',$head_category)->get();
            
            //echo json_decode($info);
            return response()->json($head_items);
        }
        
    }
    
    public function save_new_account_item(Request $request){
        
        $account_item = new AccountItem;
        
        $account_item->account_item_name = $request->account_item_name;
        $account_item->item_type = $request->head_category;
        $account_item->head_items_id = $request->head_item;
        
        $account_item->save();
        
        return back()->with('success','Account Item Created Successfully');
        
    }
    
    public function save_account_item_amount(Request $request){
        
        $id = $request->account_item_name;
        
        $account_item = AccountItem::find($id);
        
        $account_item->account_item_price = $request->amount;
        
        $account_item->save();
        
        return back()->with('success','Account Item Price Created Successfully');
        
    }
    
    public function ajax_account_item_select(Request $request){
        
        if ($request->ajax()) {
            $head_category = $request->data;
            $head_items = HeadItem::where('head_category',$head_category)->get();
            
            //echo json_decode($info);
            return response()->json($head_items);
        }
        
    }
    public function ajax_account_name_select(Request $request){
        
        if ($request->ajax()) {
            $head_name = $request->data;
            $account_items = AccountItem::where('head_items_id',$head_name)->get();
            
            //echo json_decode($info);
            return response()->json($account_items);
        }
        
    }
    public function ajax_invoice_select_class(Request $request){
        
        if ($request->ajax()) {
            $class_name = $request->data;
            $class_students = Student::where('class',$class_name)->get();
            
            view()->share('info',$class_students);
            $view = view('admin.pages.account_section.ajax_view.invoice_student_list');
            $render = $view->render();
            $result['response'] = $render;
            
//            $info = User::all();
//            view()->share('info', $info);
//            $view=view('crud.view');
//            $res=$view->render();           
//            $rest['message']= $res;
//            return response()->json($rest);
            
            
            //echo json_decode($info);
            
            return response()->json($result);
        }
        
    }
    
    public function generate_invoice_for_students(Request $request){
        
        $account_item_id = $request->select_account_item;
        $count = count($request->checked_student);
        
        for($i=0; $i<$count; $i++){
            $invoice = new Invoice;
            $invoice->account_item_id = $account_item_id;
            $invoice->user_id = $request->checked_student[$i];
            $invoice->status = 0; // unpaid status
            $invoice->type = 'income';
            
            $invoice->save();
        }
        
        return back()->with('success','Invoice Successfully Created for Students');
    }

}
