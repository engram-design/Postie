<?php

namespace Craft;

/**
 * Class Postie_ShippingMethodModel
 *
 * @property integer id
 * @property integer providerId
 * @property string  handle
 * @property string  name
 * @property boolean enabled
 */
class Postie_ShippingMethodModel extends BaseModel
{
    // Properties
    // =========================================================================

    private $_provider;


    // Public Methods
    // =========================================================================

    /**
     * Get handle
     *
     * @return string
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Check if enabled set true
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->enabled;
    }

    /**
     * @return Postie_ProviderModel
     */
    public function getProvider()
    {
        if ($this->_provider) {
            return $this->_provider;
        }

        return $this->_provider = PostieHelper::getProvidersService()->getProviderById($this->providerId);
    }

    /**
     * Define Attributes
     *
     * @return array
     */
    public function defineAttributes()
    {
        return [
            'id'         => AttributeType::Number,
            'providerId' => AttributeType::Number,
            'handle'     => [AttributeType::String, 'required' => true],
            'name'       => [AttributeType::String, 'required' => true],
            'enabled'    => [AttributeType::Bool, 'required' => false],
        ];
    }
}