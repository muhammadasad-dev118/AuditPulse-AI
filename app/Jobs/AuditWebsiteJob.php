<?php

namespace App\Jobs;

use App\Models\AuditResult;
use App\Models\Site;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class AuditWebsiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Site $site) {}

    public function handle(): void
    {
        try {
            $start = microtime(true);
            
            
            $response = Http::timeout(15)->get($this->site->url);
            $latency = round((microtime(true) - $start) * 1000);

           
            AuditResult::create([
                'tenant_id' => $this->site->tenant_id,
                'site_id' => $this->site->id,
                'health_score' => $response->successful() ? 100 : 0,
                'meta_data' => [
                    'status' => $response->status(),
                    'response_time' => $latency . 'ms',
                    'checked_at' => now()->toDateTimeString(),
                ],
            ]);
        } catch (\Exception $e) {
            
            AuditResult::create([
                'tenant_id' => $this->site->tenant_id,
                'site_id' => $this->site->id,
                'health_score' => 0,
                'meta_data' => ['error' => 'Connection failed or timeout'],
            ]);
        }
    }
}