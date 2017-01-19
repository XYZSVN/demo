<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClassName;
use App\Fee;
use App\Student;

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
