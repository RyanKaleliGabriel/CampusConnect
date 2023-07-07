<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Mpesa;
use App\Models\User;
use App\Models\Account;
use App\Models\Revenue;
use App\Models\Enroll;
use Note\Models\Notification;
use App\Http\Controllers\SystemController;
use LaravelMultipleGuards\Traits\FindGuard;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Jobs\MailJob;
use App\Models\House;

class MpesaController extends Controller
{
    /**
     * Lipa na M-PESA password
     * */
    public function lipaNaMpesaCallBack(Request $request)
    {
        // decode the data here from the mpesa payload response
        $response = json_decode($request->getContent());
        //get the reference number if exists
        $Mpesa = Mpesa::where('reference_number', $response->ReferenceNumber)->first();
        if ($Mpesa) {
            // update if request becomes true
            if ($response->Success) {
                // sync mpesa here
                Mpesa::query()->where('reference_number', $response->ReferenceNumber)->update([
                    'transaction_number' => $response->MpesaReceiptNumber,
                    'is_paid' => true,
                    'is_successful' => true,
                    'payload' => $response,
                    'callback_received_at' => now()
                ]);
  
                return redirect()->route('customers');
            } else {
                // sync mpesa here
                $Mpesa->update([
                    'transaction_number' => $response->MpesaReceiptNumber,
                    'is_paid' => false,
                    'is_successful' => true,
                    'payload' => $response,
                    'callback_received_at' => now()
                ]);
            }
        }
    }
}
