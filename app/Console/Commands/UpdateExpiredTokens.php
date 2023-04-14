<?php

namespace App\Console\Commands;

use App\Models\TestToken;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateExpiredTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:update-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update expired test tokens';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expiredTokens = TestToken::where('expiry', '<=', Carbon::now())
            ->where('is_expired', false)
            ->get();

        foreach ($expiredTokens as $token) {
            $token->is_expired = true;
            $token->save();
        }

        $this->info('Expired tokens updated successfully.');
    }
}
