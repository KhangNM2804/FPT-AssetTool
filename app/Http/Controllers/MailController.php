<?php

namespace App\Http\Controllers;

use App\Jobs\SendRemindEmail;
use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendReminderEmail()
    {


        $currentDateTime = Carbon::now('Asia/Ho_Chi_Minh');
        $formattedDateTime = $currentDateTime->toDateTimeString();
        $borrows = Borrow::with(['user', 'details.category'])->where('status', Borrow::STATUS_BORROWED)->whereDate('end_at', '<', $formattedDateTime)->get();
        dd($borrows);
        foreach ($borrows as $borrow) {
            $data = ['name' => $borrow->user->name, 'details' => $borrow->details];
            SendRemindEmail::dispatch($borrow->user->email, $borrow->user->name, "Nhắc nhở hoàn trả tài sản đã mượn", ['khangdeptrai2804@gmail.com', 'khangnm2804@gmail.com'], $data);
        }

        return "Email sent successfully!";
    }
}
