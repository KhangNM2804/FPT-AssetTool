<?php

namespace App\Console\Commands;

use App\Jobs\SendRemindEmail;
use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendMailTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hourly:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail to user borrowed asset';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Gửi email mỗi giờ.');
        $currentDate = Carbon::now()->toDateString();
        $borrows = Borrow::with(['user', 'details.category'])->where('status', Borrow::STATUS_BORROWED)->whereDate('end_at', '<', $currentDate)
            ->get();
        foreach ($borrows as $borrow) {
            $data = ['name' => $borrow->user->name, 'details' => $borrow->details];
            SendRemindEmail::dispatch($borrow->user->email, $borrow->user->name, "Nhắc nhở hoàn trả tài sản đã mượn", ['khangdeptrai2804@gmail.com', 'khangnm2804@gmail.com'], $data);
        }

        return "Email sent successfully!";
    }
}
