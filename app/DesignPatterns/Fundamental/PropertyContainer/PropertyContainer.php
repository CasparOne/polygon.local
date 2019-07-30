<?php


namespace App\DesignPatterns\Fundamental\PropertyContainer;


use App\DesignPatterns\Fundamental\PropertyContainer\Interfaces\PropertyContainerInterface;

/**
 * Class PropertyContainer
 * @package App\DesignPatterns\Fundamental\PropertyContainer
 */
class PropertyContainer implements PropertyContainerInterface
{
    /**
     * @var array
     */
    private $propertyContainer = [];

    /**
     * @param $propertyName
     * @param $value
     * @return mixed
     */
    public function addProperty($propertyName, $value)
    {
        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @param $propertyName
     * @return mixed
     */
    public function deleteProperty($propertyName)
    {
        unset($this->propertyContainer[$propertyName]);
    }

    /**
     * @param $propertyName
     * @return mixed
     */
    public function getProperty($propertyName)
    {
        return $this->propertyContainer[$propertyName] ?? null;
    }

    /**
     * @param $propertyName
     * @param $value
     * @return mixed|void
     * @throws \Exception
     */
    public function setProperty($propertyName, $value)
    {
        if (!isset($this->propertyContainer[$propertyName])) {
            throw new \Exception("Property [{$propertyName}] not found");
        }

        $this->propertyContainer[$propertyName] = $value;
    }

}
