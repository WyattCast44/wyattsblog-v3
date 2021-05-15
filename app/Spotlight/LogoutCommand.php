<?php

namespace App\Spotlight;

use Auth;
use LivewireUI\Spotlight\Spotlight;
use LivewireUI\Spotlight\SpotlightCommand;

class LogoutCommand extends SpotlightCommand
{
    /**
     * This is the name of the command that will be shown in the Spotlight component.
     */
    protected string $name = 'Logout';

    /**
     * This is the description of your command which will be shown besides the command name.
     */
    protected string $description = 'Logout of your account';

    public function execute(Spotlight $spotlight)
    {
        Auth::logout();

        $spotlight->redirectRoute('welcome');
    }

    public function shouldBeShown(): bool
    {
        return auth()->check();
    }
}
