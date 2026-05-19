<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Team;
use Illuminate\Support\Str;


class TeamController extends Controller
{
    //
    function  __construct(){
        
    }

     public function index(Request $request)
    {
        $page_title     = "All Team";
        $main_title     = "Team";
        $empty_message  = "No team yet";
        $delete_title = "Team";
        $delete_url = "admin.team.delete";
        if($request->status){
           $status      =   $request->status;
           $page_title  = ucfirst($status)." Team";
           $team  = team::where('status',$status)->orderby('id','desc')->get();
        }else{
           $team = team::orderby('id','desc')->get();   
        }
       
        return view('admin.team.index', compact('page_title', 'empty_message', 'team','delete_title','delete_url','main_title'));
    }
  
     public function form(Request $request){

            $data['page_title']  = "Add Team";
            $data['go_back_url'] = "admin.team";
            $data['main_title']  = "Team";
            
        if($request->id){

            $data['page_title']  = "Update Team";
            $data['go_back_url'] = "admin.team";
            $data['team'] = team::where('id',$request->id)->first(); 
         }

        return view('admin.team.form',$data);
     }
   
    public function store(Request $request)
    {
        if($request->id){
           $request->validate([
                'name'       => 'required|string',
                'image'      =>   'image|mimes:jpeg,png,jpg|max:2048',
                // 'description'     => 'required',
                'status'     => 'required',
            ]);
        }else{
            $request->validate([
                'name'       => 'required|string',
                'image'      => 'required|image|mimes:jpeg,png,jpg|max:2048',
                // 'description'     => 'required',
                'status'     => 'required',
            ]);
        }
       
        
        if($request->id){
              $team = team::findOrFail($request->id);
            //   $slug    = $team->slug;
        }else{
             $team = new team();
            //  $slug = Str::slug($request->title);
         }

        if ($request->hasFile('image')) {

            try {
                  $imageName = time().'.'.$request->image->extension();  
                  $request->image->move(public_path('uploads/team'), $imageName);
                
            } catch (\Exception $exp) {
                return response()->json(['status'=>'error', 'message'=>'Could not upload the  image']);
            }
        }else{
            $imageName = $team->image;
        }
        
        if(!empty($request->social) && count($request->social)>0){
              $teamReq  = json_encode($request->social);
        }else{
            $teamReq  = $team->social;
        }
        
        $team->name               = $request->name;
        $team->designation        = $request->designation;
        $team->slug               = Str::slug($request->name);
        $team->image              = $imageName;
        $team->description        = $request->description;
        $team->social            = $teamReq;
        $team->status             = $request->status;
        $team->save();

        if($request->id){
              $notify[] = ['success', ' Updated Successfully'];
        }else{
              $notify[] = ['success', ' Added Successfully'];
        }
      
        return redirect()->back()->withNotify($notify);
    }


    public function delete($id)
    {
        $team = team::where('id', $id)->first();
        if(!empty($team)){
            $team->delete();
            $notify[] = ['success', 'Team Deleted Successfully'];
            return redirect()->back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'Something went wrong'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
