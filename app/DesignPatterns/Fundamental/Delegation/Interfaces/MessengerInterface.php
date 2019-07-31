<?php


namespace App\DesignPatterns\Fundamental\Delegation\Interfaces;

/**
 * Interface MessengerInterface
 *
 * @package App\DesignPatterns\Fundamental\Delegation\Interfaces
 */
interface MessengerInterface
{
    /**
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setSender($value) : MessengerInterface;

    /**
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setRecipient($value) : MessengerInterface;

    /**
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setMessage($value) : MessengerInterface;

    /**
     * @return bool
     */
    public function send() : bool ;
}
