<?php


namespace App\DesignPatterns\Fundamental\Delegation\Messengers;

/**
 * Class SmsMessenger
 *
 * @package App\DesignPatterns\Fundamental\Delegation\Messengers
 */
class SmsMessenger extends AbstractMessenger
{
    /**
     * @return bool
     */
    public function send(): bool
    {
        // TODO: Need to make implementation sending via Sms
        \Debugbar::info('Sent by '.__METHOD__);
        return parent::send();
    }
}
