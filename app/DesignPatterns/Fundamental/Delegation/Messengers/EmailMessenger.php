<?php


namespace App\DesignPatterns\Fundamental\Delegation\Messengers;

/**
 * Class EmailMessenger
 *
 * @package App\DesignPatterns\Fundamental\Delegation\Messengers
 */
class EmailMessenger extends AbstractMessenger
{
    /**
     * @return bool
     */
    public function send(): bool
    {
        // TODO: Need to make implementation sending via Email
        \Debugbar::info('Sent by' . __METHOD__);
        return parent::send();
    }

}
