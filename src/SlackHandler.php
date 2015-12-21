<?php

namespace Rutorika\LaravelSlackAlert;

class MentionedSlackHandler extends \Monolog\Handler\SlackHandler
{
    protected $mentionTo = '!everyone';

    /**
     * Prepares content data
     *
     * @param  array $record
     *
     * @return array
     */
    protected function prepareContentData($record)
    {
        $record['message'] = '<' . $this->mentionTo . '>' . "\n" . $record['message'];

        return parent::prepareContentData($record);
    }

    /**
     * Set username which be mentioned in slack message
     *
     * @param $username
     */
    public function setMentionTo($username)
    {
        $this->mentionTo = $username;
    }
}
