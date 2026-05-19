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
                        <td>Registration No</td>
                        <td>
                            {{$membership->id}}
                        </td>
                    </tr>
                    <tr>
                        <td>Accounts Status</td>
                        <td>
                            {{$membership->status==1?"Active":"Deactivate"}}
                        </td>
                    </tr>
                    <tr>
                        <td>Verification Date</td>
                        <td>
                          {{$membership->verification_date}}
                        </td>
                    </tr>
                    <tr>
                        <td>Validity </td>
                        <td>
                           {{$membership->validity}}
                        </td>
                    </tr>
                    <tr>
                        <td>Membership Fee</td>
                        <td>
                            {{$membership->membership_fee}}
                        </td>
                    </tr>

                      
                </tbody>
            </table>
            <a href="#" class="btn btn-primary">Download PDF</a>
       </div>
      <!-- End Form -->
    </div>
</div>
<!-- end row -->
@endsection