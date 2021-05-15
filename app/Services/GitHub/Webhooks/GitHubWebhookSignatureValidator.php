<?php

namespace App\Services\GitHub\Webhooks;

use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;
use Spatie\WebhookClient\Exceptions\WebhookFailed;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;

/**
 * @link https://docs.github.com/en/developers/webhooks-and-events/securing-your-webhooks
 */
class GitHubWebhookSignatureValidator implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signature = $request->header($config->signatureHeaderName);

        if (! $signature) {
            return false;
        }

        $signingSecret = $config->signingSecret;

        if (empty($signingSecret)) {
            throw WebhookFailed::signingSecretNotSet();
        }

        $computedSignature = "sha256=" . hash_hmac('sha256', $request->getContent(), $signingSecret);

        return hash_equals($signature, $computedSignature);
    }
}
