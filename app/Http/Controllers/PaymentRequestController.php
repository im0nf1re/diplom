<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nds;
use App\Models\RequestPaymentKind;
use App\Models\PaymentRequest;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class PaymentRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->middleware('auth');

        return view('payment-request.index', ['paymentRequests' => Auth::user()->paymentRequests()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('payment-request.create')->with([
            'nds' => Nds::all(),
            'requestPaymentKinds' => RequestPaymentKind::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        try {
            $paymentRequest = new PaymentRequest();
            $paymentRequest->user_id = Auth::id();

            $paymentRequest->number = $request->number ?? rand();
            $paymentRequest->date_from = $request->date_from;
            $paymentRequest->company_name = $request->company_name;
            $paymentRequest->company_inn = $request->company_inn;
            $paymentRequest->nds_id = $request->nds;
            $paymentRequest->company_bank_bik = $request->company_bank_bik;
            $paymentRequest->company_bank_name = $request->company_bank_name;
            $paymentRequest->company_corr_account = $request->company_corr_account;
            $paymentRequest->company_rass_account = $request->company_rass_account;
            $paymentRequest->date_from = $request->date_from;

            $paymentRequest->payer_name = $request->payer_name;
            $paymentRequest->payer_inn = $request->payer_inn;
            $paymentRequest->payer_bank_bik = $request->payer_bank_bik;
            $paymentRequest->payer_bank_name = $request->payer_bank_name;
            $paymentRequest->payer_corr_account = $request->payer_corr_account;
            $paymentRequest->payer_rass_account = $request->payer_rass_account;

            $paymentRequest->sum = $request->sum;
            $paymentRequest->request_payment_kind_id = $request->request_payment_kind;
            $paymentRequest->documents_send_date = $request->documents_send_date;
            $paymentRequest->accept = $request->accept;
            if ($request->accept) {
                $paymentRequest->accept_period = $request->accept_period;
            } else {
                $paymentRequest->payment_condition = $request->payment_condition;
            }

            $paymentRequest->description = $request->description;
            $paymentRequest->nds_string = $request->nds_string;

            $paymentRequest->save();
        } catch (\Exception $exception) {
            echo 'error';
        }
    }

    public function download(Request $request) {
        $data = [
            'number' => $request->number ?? rand(),
            'date_from' => date("d.m.Y", strtotime($request->date_from)),
            'company_name' => $request->company_name,
            'company_inn' => $request->company_inn,
            'nds' => Nds::find($request->nds),
            'company_bank_bik' => $request->company_bank_bik,
            'company_bank_name' => $request->company_bank_name,
            'company_corr_account' => $request->company_corr_account,
            'company_rass_account' => $request->company_rass_account,
            'payer_name' => $request->payer_name,
            'payer_inn' => $request->payer_inn,
            'payer_bank_bik' => $request->payer_bank_bik,
            'payer_bank_name' => $request->payer_bank_name,
            'payer_corr_account' => $request->payer_corr_account,
            'payer_rass_account' => $request->payer_rass_account,
            'sum' => $request->sum,
            'sum_string' => PaymentRequest::sumToString(floatval($request->sum)),
            'request_payment_kind' => RequestPaymentKind::find($request->request_payment_kind),
            'documents_send_date' => date("d.m.Y", strtotime($request->documents_send_date)),
            'accept' => $request->accept,
            'description' => $request->description,
            'nds_string' => $request->nds_string,
        ];
        if ($request->accept) {
            $data['accept_period'] = $request->accept_period;
        } else {
            $data['payment_condition'] = $request->payment_condition;
        }

        $pdf = PDF::loadView('payment-request.table', $data);
        return $pdf->download('document.pdf');
    }

    public function downloadFromLk($id) {
        $this->middleware('auth');

        $paymentRequest = PaymentRequest::find($id);
        $data = [
            'number' => $paymentRequest->number ?? rand(),
            'date_from' => date("d.m.Y", strtotime($paymentRequest->date_from)),
            'company_name' => $paymentRequest->company_name,
            'company_inn' => $paymentRequest->company_inn,
            'nds' => Nds::find($paymentRequest->nds_id),
            'company_bank_bik' => $paymentRequest->company_bank_bik,
            'company_bank_name' => $paymentRequest->company_bank_name,
            'company_corr_account' => $paymentRequest->company_corr_account,
            'company_rass_account' => $paymentRequest->company_rass_account,
            'payer_name' => $paymentRequest->payer_name,
            'payer_inn' => $paymentRequest->payer_inn,
            'payer_bank_bik' => $paymentRequest->payer_bank_bik,
            'payer_bank_name' => $paymentRequest->payer_bank_name,
            'payer_corr_account' => $paymentRequest->payer_corr_account,
            'payer_rass_account' => $paymentRequest->payer_rass_account,
            'sum' => $paymentRequest->sum,
            'sum_string' => PaymentRequest::sumToString(floatval($paymentRequest->sum)),
            'request_payment_kind' => RequestPaymentKind::find($paymentRequest->request_payment_kind_id),
            'documents_send_date' => date("d.m.Y", strtotime($paymentRequest->documents_send_date)),
            'accept' => $paymentRequest->accept,
            'description' => $paymentRequest->description,
            'nds_string' => $paymentRequest->nds_string,
        ];
        if ($paymentRequest->accept) {
            $data['accept_period'] = $paymentRequest->accept_period;
        } else {
            $data['payment_condition'] = $paymentRequest->payment_condition;
        }

        $pdf = PDF::loadView('payment-request.table', $data);
        return $pdf->download('document.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $this->middleware('auth');

        $paymentRequest = PaymentRequest::find($id);
        $data = [
            'number' => $paymentRequest->number ?? rand(),
            'date_from' => date("d.m.Y", strtotime($paymentRequest->date_from)),
            'company_name' => $paymentRequest->company_name,
            'company_inn' => $paymentRequest->company_inn,
            'nds' => Nds::find($paymentRequest->nds_id),
            'company_bank_bik' => $paymentRequest->company_bank_bik,
            'company_bank_name' => $paymentRequest->company_bank_name,
            'company_corr_account' => $paymentRequest->company_corr_account,
            'company_rass_account' => $paymentRequest->company_rass_account,
            'payer_name' => $paymentRequest->payer_name,
            'payer_inn' => $paymentRequest->payer_inn,
            'payer_bank_bik' => $paymentRequest->payer_bank_bik,
            'payer_bank_name' => $paymentRequest->payer_bank_name,
            'payer_corr_account' => $paymentRequest->payer_corr_account,
            'payer_rass_account' => $paymentRequest->payer_rass_account,
            'sum' => $paymentRequest->sum,
            'sum_string' => PaymentRequest::sumToString(floatval($paymentRequest->sum)),
            'request_payment_kind' => RequestPaymentKind::find($paymentRequest->request_payment_kind_id),
            'documents_send_date' => date("d.m.Y", strtotime($paymentRequest->documents_send_date)),
            'accept' => $paymentRequest->accept,
            'description' => $paymentRequest->description,
            'nds_string' => $paymentRequest->nds_string,
        ];
        if ($paymentRequest->accept) {
            $data['accept_period'] = $paymentRequest->accept_period;
        } else {
            $data['payment_condition'] = $paymentRequest->payment_condition;
        }

        return view('payment-request.table', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function table() {
        return view('payment-request.table');
    }
}
