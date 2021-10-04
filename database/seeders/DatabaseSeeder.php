<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\Manager;
use App\Models\Customer;
use App\Models\Complaint;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create();
        Branch::factory()->count(3)->create()->each(function ($branch) {
            Manager::factory()->create(['branch_id' => $branch->id]);
            Customer::factory()->count(8)->create(['branch_id' => $branch->id])->each(function ($customer) {
                Complaint::factory()->count(5)->create(['customer_id' => $customer->id, 'branch_id' => $customer->branch_id]);
            });
        });
    }
}
