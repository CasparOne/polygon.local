<?php


namespace App\DesignPatterns\Fundamental\Delegation;

use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;
use App\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessenger;
use App\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;

/**
 * Class AppMessenger
 * @package App\DesignPatterns\Fundamental\Delegation
 *
 */
class AppMessenger implements MessengerInterface
{

    /**
     * @var MessengerInterface
     */
    private $messenger;

    /**
     * AppMessenger constructor.
     * The default messenger is Email
     */
    public function __construct()
    {
        $this->toEmail();
    }

    /**
     * @return $this
     */
    public function toEmail()
    {
        $this->messenger = new EmailMessenger();

        return $this;
    }

    /**
     * @return $this
     */
    public function toSms()
    {
        $this->messenger = new SmsMessenger();

        return $this;
    }

    /**
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setSender($value): MessengerInterface
    {
        $this->messenger->setSender($value);

        return $this->messenger;
    }

    /**
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setRecipient($value): MessengerInterface
    {
        $this->messenger->setRecipient($value);

        return $this->messenger;
    }

    /**
     * @param $value
     *
     * @return MessengerInterface
     */
    public function setMessage($value): MessengerInterface
    {
        $this->messenger->setMessage($value);

        return $this->messenger;
    }

    /**
     * @return bool
     */
    public function send(): bool
    {
        return $this->messenger->send();
    }
}
