<?php 

namespace App\Services\GitHub\Webhooks;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookProfile\WebhookProfile;

class GitHubWebhookProfile implements WebhookProfile
{
    public function shouldProcess(Request $request): bool
    {
        return true;
    }
}