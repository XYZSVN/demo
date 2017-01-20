<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClassName;
use App\Fee;
use App\Student;
use App\HeadItem;

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
        
        return view('admin.pages.account_section.account_settings', compact('all_head_items'));
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

}
