# Rutorika Laravel Slack Alert Provider

Provides errors logging to the slack

### Install

```bash
xu@calypso:~$ composer require rutorika/laravel-slack-alerts
```

Add service provider to `config/app.php`

```php
'providers' => [
    // other providers...

    Rutorika\LaravelSlackAlert\SlackAlertServiceProvider::class,
]
```

Publish config

```
xu@calypso:~$ php artisan vendor:publish --provider="Rutorika\LaravelSlackAlert\SlackAlertServiceProvider"
```

Add enviroment variables to your `.env` file (see `config/slack-alert.php` for defaults)

```
SLACK_CHANNEL=#dev-alert
SLACK_TOKEN=xxxx-xxxxxxxxxx-xxxxxxxxxx-xxxxxxxxxxx-xxxxxxxxxx
SLACK_NAME="Site Name"
SLACK_MENTION_TO=@username
```
