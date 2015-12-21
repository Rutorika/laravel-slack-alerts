<?php

namespace Rutorika\LaravelSlackAlert;

use Illuminate\Log\Writer;
use Illuminate\Support\ServiceProvider;
use Monolog\Logger;

class SlackAlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/slack-alert.php' => config_path('slack-alert.php'),
        ]);

        $enabledForEnviroments = config('slack-alert.enviroments');

        if (in_array($this->app->environment(), $enabledForEnviroments)) {

            $channel = config('slack-alert.channel');
            $token = config('slack-alert.token');
            $name = config('slack-alert.app_name');
            $mentionTo = config('slack-alert.mention_to');
            $level = config('slack-alert.level');

            if ($token) {
                /** @var Writer $logger */
                $logger = $this->app['log'];

                $slackHandler = new MentionedSlackHandler($token, $channel, $name, true, null, $level);
                $slackHandler->setMentionTo($mentionTo);
                $logger->getMonolog()->pushHandler($slackHandler);
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/slack-alert.php', 'slack-alert');
    }
}
