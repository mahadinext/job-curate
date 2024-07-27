<?php

namespace App\Console\Commands;

use App\Models\Jobs;
use App\Models\Pages;
use App\Models\v1\careepick\JobSeeker\JobSeeker;
use App\Models\v1\careepick\Recruiter\Company;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateJobEmployeeEmployerCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:job-employee-employer-count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update total count of jobs, employee, employer';

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
     * @return void
     */
    public function handle()
    {
        try {
            $jobs = Jobs::all()->count();
            $company = Company::all()->count();
            $jobSeeker = JobSeeker::all()->count();

            $pageContents = (object) [];
            $params = [
                "count" => [
                    "total_job" => $jobs,
                    "total_employee" => $company,
                    "total_employer" => $jobSeeker,
                ],
            ];

            $countPage = Pages::where('page_name', 'count')->first();
            if ($countPage) {
                $pageContents = (object) json_decode($countPage->page_contents, true);
                $pageContents = $params;
                Pages::where('page_name', 'count')->update(['page_contents' => json_encode($pageContents, true)]);
            } else {
                $pageContents = $params;
                Pages::create([
                    'page_name' => 'count',
                    'page_contents' => json_encode($pageContents, true),
                ]);
            }

            Log::info("Command [update:job-employee-employer-count]");
        } catch (Exception $exception) {
            Log::error("Error", [$exception]);
        }
    }
}
