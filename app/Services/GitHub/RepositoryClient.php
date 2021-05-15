<?php

namespace App\Services\GitHub;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;
use App\Services\GitHub\Exceptions\NotImplementedException;

class RepositoryClient
{
    const DEFAULT_TIMEOUT_SEC = 3;
    
    public static function getConfiguredHttpClient(User $user = null): PendingRequest
    {
        return Http::retry(3, 50)
            ->timeout(self::DEFAULT_TIMEOUT_SEC)
            ->withHeadersIf($user != null, [
                'Authorization' => 'token ' . $user?->auth_token,
            ])
            ->withHeaders([
                'Accept' => 'application/vnd.github.v3+json',
            ]);
    }

    /**
     * @link https://docs.github.com/en/rest/reference/repos#get-a-repository
     */
    public static function find(string $repository, User $user = null): array
    {
        return rescue(function() use ($repository, $user) {
            return self::getConfiguredHttpClient($user)
                ->get("https://api.github.com/repos/{$repository}")
                ->json();
        }, function() {
            return [
                'name' => '',
                'private' => false,
                'description' => '',
            ];
        });
    }

    public static function findOrFail(string $repository, User $user = null)
    {
        throw new NotImplementedException;
    }

    public static function delete(string $repository, User $user = null)
    {
        throw new NotImplementedException;
    }

    public static function update(string $repository, User $user = null, array $params)
    {
        throw new NotImplementedException;
    }

    public static function enableAutomatedSecurityFixes(string $repository, User $user = null)
    {
        throw new NotImplementedException;
    }

    public static function disableAutomatedSecurityFixes(string $repository, User $user = null)
    {
        throw new NotImplementedException;
    }

    public static function organizationalRepositories(string $organization, User $user = null)
    {
        throw new NotImplementedException;
    }

    public static function organizationalRepositoriesCreate(string $organization, User $user, array $params)
    {
        throw new NotImplementedException;
    }

    /**
     * @success see database/stubs/github-repo-webhook-create.php
     * @error null
     * @link https://docs.github.com/en/rest/reference/repos#create-a-repository-webhook
     */
    public static function repositoryWebhooksCreate(string $repository, User $user, array $params): array|null
    {
        return rescue(function() use ($repository, $user) {
            return self::getConfiguredHttpClient($user)
                ->post("https://api.github.com/repos/{$repository}/hooks", [
                    'name' => 'web',
                    'config' => [
                        'url' => config('services.github.webhooks.url'),
                        'content_type' => 'json',
                        'secret' => config('services.github.signing_secret'),
                        'insecure_ssl' => 1,
                    ],
                    'events' => ["push", "release"],
                    'active' => true,
                ])
                ->json();
        }, function() {
            return null;
        });
    }

    /**
     * @success see database/stubs/github-repo-release.php
     * @empty []
     * @error null
     * @link https://docs.github.com/en/rest/reference/repos#list-releases
     */
    public static function repoReleases(string $repository, User $user = null): array|null
    {
        return rescue(function() use ($repository, $user) {
            return self::getConfiguredHttpClient($user)
                ->get("https://api.github.com/repos/{$repository}/releases?per_page=10")
                ->json();
        }, function() {
            return null;
        });
    }
}

// RepositoryClient::find('laravel/laravel', auth()->user());
// RepositoryClient::findOrFail('laravel/laravel', auth()->user());
// RepositoryClient::update('laravel/laravel', auth()->user(), []);
// RepositoryClient::delete('laravel/laravel', auth()->user());
// RepositoryClient::organizationalRepositories('laravel', auth()->user());
// RepositoryClient::organizationalRepositoriesCreate('laravel', auth()->user(), []);
// RepositoryClient::enableAutomatedSecurityFixes('laravel/laravel', auth()->user());
// RepositoryClient::disableAutomatedSecurityFixes('laravel/laravel', auth()->user());