<?php

namespace App\Jobs;

use App\Models\Branch;
use App\Models\Manager;
use Illuminate\Bus\Queueable;
use App\Mail\ComplaintSummary;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $branches = Branch::with(['complaints', 'manager', 'manager.user'])->withCount([
            'complaints',
            'complaints as resolved_complaints' => function ($query) {
                $query->where('reviewed', 1);
            },
            'complaints as pending_complaints' => function ($query) {
                $query->where('reviewed', 0);
            },
        ])->get();

        foreach ($branches as $branch) {
            Mail::to($branch->manager->user->email)->send(new ComplaintSummary($branch));
        }
    }
}
