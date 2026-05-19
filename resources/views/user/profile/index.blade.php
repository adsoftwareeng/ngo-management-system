@extends('layouts.master')
@section('content')
 
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card-box table-responsive text-center">
             <h4 class="header-title text-center"> {{$page_title}}  </h4>
          <!-- Form -->
          <hr/>
              <table class="table table-bordered w-100 text-dark tableBorder">
                     <tbody>
                         <tr>
                        <td><label class="control-label">Registration No</label></td>
                        <td><p>{{$profile->id}} </p></td>
                    </tr>
                     
                     
                    <tr>
                        <td><label class="control-label">Name</label></td>
                        <td><p>{{$profile->name}}  </p></td>
                    </tr>
                    
                    <tr>
                        <td><label class="control-label">Father  Name</label></td>
                        <td><p>{{$profile->father_name}}</p></td>
                    </tr>
                    
                    <tr>
                        <td> <label class="control-label">Email</label>  </td>
                        <td><p> {{$profile->email}} </p></td>
                    </tr>
                    
                    <tr>
                        <td> <label class="control-label">Mobile</label> </td>
                        <td><p> {{$profile->phone}}</p></td>
                    </tr>
                    
                     <tr>
                        <td> <label class="control-label">Designation</label> </td>
                        <td><p>   {{$profile->designation}}  </p></td>
                    </tr>
                    
                     <tr>
                        <td> <label class="control-label">Date Of Birth</label> </td>
                        <td><p> {{$profile->dob}}</p></td>
                    </tr>
                    
                     <tr>
                        <td><label class="control-label">Aadhar Card No</label>  </td>
                        <td><p> {{$profile->aadhar_no}}</p></td>
                    </tr>
                    
                    
                     <tr>
                        <td><label class="control-label">City</label>  </td>
                        <td><p> {{$profile->city}}</p></td>
                    </tr>
                    
                     <tr>
                        <td><label class="control-label">Address</label>  </td>
                        <td><p> {{$profile->address}}</p></td>
                    </tr>
                    
                    
                     <tr>
                        <td> <label class="control-label">Account's Status</label> </td>
                        <td><p>{{$profile->status==1?'Active':'Inactive'}}</p></td>
                    </tr>
                    
                     <tr>
                        <td> <label class="control-label">User Profile</label> </td>
                        <td ><p><img src="{{isset($profile)?asset('public/uploads/users/'.$profile->image):'user.png'}}" class="img-responsive" style="width:100px;height:100px;"></p></td>
                    </tr>
                      
                </tbody>
                </table>
          
       </div>
      <!-- End Form -->
    </div>
</div>
<!-- end row -->
@endsection