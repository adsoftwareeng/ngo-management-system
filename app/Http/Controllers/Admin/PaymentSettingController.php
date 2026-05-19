<?php
namespace App\Http\Controllers\Admin;
use App\Models\{PaymentSetting,GeneralSetting};
use App\{
    Http\Controllers\Controller,
    Http\Requests\PaymentSettingRequest,
    Repositories\Back\PaymentSettingRepository
};

use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    /**
     * Constructor Method.
     *
     * Setting Authentication
     *
     * @param  \App\Repositories\Back\PaymentSettingRepository $repository
     *
     */
    public function __construct(PaymentSettingRepository $repository)
    {
        // $this->middleware('auth:admin');
        // $this->middleware('adminlocalize');
        $this->repository = $repository;
    }

    /**
     * Show the form for updating resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        $data['general'] = GeneralSetting::first();
        $data['page_title'] = 'Payment Settings';
        // dd(base_path()."/public/uploads/payment/");
        return view('admin.setting.payment', $this->repository->payment(), $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentSettingRequest $request)
    {
        $this->repository->update($request);
        return redirect()->back()->withSuccess(__('Payment Information Updated Successfully.'));
    }

}
