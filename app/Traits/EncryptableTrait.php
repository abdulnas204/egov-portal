<?php

namespace App\Traits;

/**
 * Trait EncryptableTrait
 */
trait EncryptableTrait
{
    /**
     * @param $attribute
     * @param $value
     *
     * @return mixed
     */
    public function setAttribute($attribute, $value)
    {
        if (in_array($attribute, $this->encryptable) && $value !== '') {
            $value = encrypt($value);
        }

        return parent::setAttribute($attribute, $value);
    }

    /**
     * @param $attribute
     *
     * @return mixed
     */
    public function getAttribute($attribute)
    {
        $value = parent::getAttribute($attribute);

        if (in_array($attribute, $this->encryptable) && $value !== '') {
            $value = decrypt($this->attributes[$attribute]);
        }

        return $value;
    }
}
