<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Add_category;
use App\Models\App_name;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\User;


class AdminController extends Controller
{
    


/*profile update */
      public function Passwordupdate(Request $request, $id){


        $name= $request->input('name');
        $email= $request->input('email');
      $password = $request->input('password');
        $confirmpassword = $request->input('confirmpassword');

        if( $email==auth()->user()->email){
          return back()->with("message", "No changes Email");
        }
        if($name == auth()->user()->name){
          return back()->with("message", "No changes Name");
        }
       
      if(empty($password)){

        DB::update('update users set name= ?, email = ? where id = ?',[$name,$email,$id]);
return back()->with(['message'=>'Profile Update Successfully!!']);

      }else{

        if($password == $confirmpassword){
        DB::update('update users set name= ?, email = ?, password= ? where id = ?',[$name,$email,Hash::make($password),$id]);
return back()->with(['message'=>'Profile Update Successfully!!']);
        }else{
          return back()->with(['message'=>'Two Password Do Not Match!']);
        }
      }
        }
        

/* add new app */

public function NewAppinsert(Request $request){

$new_app = new App_name;
$new_app->app_name = $request->app_name;
$new_app->category_id =implode(',', $request->category_id);

$new_app->save();
return back()->with("message", "App Added");

}




//app lists


public function applistselect(){


  $show_applist = App_name::find();
return view("app-list", ['select'=>$show_applist]);





  // $select = DB::select('select * from app_name');
  // $newArr = array();

  // foreach($select as $row){

  //   $cat_ids_str = $row->category_id; //1,2,

  //   $sql = "select names from category where id in (". $cat_ids_str.")";
  //   $select_qu = DB::select($sql);
  //   $catname_Tstr=[];
  //   foreach($select_qu as $row2){
  //     $catname_Tstr[] = $row2->names;
  //   }
  //   $catname = implode(',', $catname_Tstr); // ar,leg

  //   $row->category_id_as_name = $catname;
  //   $newArr[] = $row;
  // }

  //   return view('app-list',['select'=>$newArr]);

 }

 public function catname_get($cat_ids_str){

  
    return view('app-list',['select'=>$select]);

 }





public function NewAppselectid(Request $request, $id){
  
$selectid= DB::select('select * from app_name where id= ?', [$id]);
$appnames= DB::select('select * from category');



return view("app-list-update", ['selectid'=>$selectid, 'appnames'=>$appnames]);


}

public function deleteApplist($id){
 DB::delete('delete from app_name where id= ?', [$id]);
 
 return back()->with("message", "Deleted!!");
}


//category select
public function categoryselect(){
  $selects= DB::select("select * from languages");
  return view('add-new-category', ['selects'=>$selects]);
}

//category insert
public function categoryinsert(Request $request){
  
$insert_category = new Add_category;
$insert_category->language_name = $request->language_name;
$insert_category->category_name = $request->category_name;
$insert_category->categoryaudioUploadType = $request->categoryaudioUploadType;
$insert_category->category_audio = $request->category_audio;
$insert_category->categoryImageUploadType = $request->categoryImageUploadType;
$insert_category->category_img = $request->category_img;
$insert_category->save();
return redirect('category-list');

}



//category select..

public function categorylistselect(){

$selects = DB::select("select * from add_category");
return view("category-list", ['selects'=>$selects]);

}



// add new app

public function NewAppselect(){
  $appnames= DB::select('select * from category');
  return view('add-new-app',['appnames'=>$appnames]);
}










/*logout*/
public function logout(Request $request) {
  return redirect('login')->with(Auth::logout());
}




}






