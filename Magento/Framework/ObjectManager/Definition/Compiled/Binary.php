<?php
/**
 * Igbinary serialized definition reader
 *
 * {license_notice}
 *
 * @copyright {copyright}
 * @license   {license_link}
 */
namespace Magento\Framework\ObjectManager\Definition\Compiled;

class Binary extends \Magento\Framework\ObjectManager\Definition\Compiled
{
    /**
     * Unpack signature
     *
     * @param string $signature
     * @return mixed
     */
    protected function _unpack($signature)
    {
        return igbinary_unserialize($signature);
    }
}
