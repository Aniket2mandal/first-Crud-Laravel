<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

  // TO FETCH DATA
  public function index(){
    // WE HAVE TO SHOW DATA IN INDEX PAGE SO WRITE QUERY IN INDEX PAGGE FUNCTION
    $categories=Category::select('id','name','status')->get();
   return view('category.index',compact('categories'));
  }
  public function create(){
    return view('category.create');
    // echo "create page";
   }



   public function store(Request $request){
  //  FOR VALIDATION AND REQUIREMENTS
  $request->validate([
'name'=>'required|string|nullable|max:255|regex:/^[a-zA-Z]+$/|unique:categories'
  ]);
// TO INSERT DATA
     // SYNTAX variable = new Model_name();
  $category=new Category();
  // SYNTAX variable->table_column_name =$request->form_input_name
  $category->name=$request->name;
  $category->status=$request->status;
  $category->save();
  // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
  return redirect()->route('category.index')->with('sucess','category created sucessfully');
   }



  //  TO EDIT DATA
  public function edit($id){
    $categories=Category::find($id);
    return view('category.edit',compact('categories'));
  }
  public function update(Request $request,$id){
   // FOR VALIDATION AND REQUIREMENTS
    $request->validate([
  'name'=>'required|string|nullable|max:255|regex:/^[a-zA-Z]+$/|unique:categories'
    ]);
       // SYNTAX variable = new Model_name();
    //$category=new Category();
    $category=Category::where('id',$id)->get();
    // SYNTAX variable->table_column_name =$request->form_input_name
    foreach($category as $data){
    $data->name=$request->name;
    $data->status=$request->status;
    $data->save();
    }
    // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
    return redirect()->route('category.index')->with('sucess','category updated sucessfully');
     }



    //  TO DELETE
    public function delete($id){
      $category=Category::where('id',$id)->first();
      $category->delete();
          // TO RETURN TO ANOTHER PAGE AFTER INSERTING WITH SUCESS MESSAGE
    return redirect()->route('category.index')->with('sucess','category deleted sucessfully');
    }
  }

