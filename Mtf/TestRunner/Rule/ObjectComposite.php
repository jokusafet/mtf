<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

namespace Mtf\TestRunner\Rule;

use Mtf\TestCase\Injectable;

/**
 * Class Rule
 *
 * @package Mtf\TestRunner
 * @api
 */
class ObjectComposite extends AbstractRule implements ObjectRuleInterface
{
    /**
     * @var \PHPUnit_Framework_TestCase
     */
    protected $testCase;

    /**
     * Apply configuration rules to check if Test Case is eligible for execution
     *
     * @param \PHPUnit_Framework_TestCase $testCase
     * @return bool
     */
    public function apply(\PHPUnit_Framework_TestCase $testCase)
    {
        $this->testCase = $testCase;
        $result = true;
        $rules = $this->testRunnerConfig->getValue('objectRules');
        // @todo implement as standalone rule classes
        if ($rules) {
            foreach ($rules as $instanceOf => $rule) {
                if ($testCase instanceof $instanceOf) {
                    $result = $result && $this->processRule($rule);
                    if ($result === false) {
                        break;
                    }
                }
            }
        }
        return $result;
    }

    /**
     * Check whether test case is matched to specified object
     *
     * @param string $value
     * @return bool|null
     */
    protected function objectMatch($value)
    {
        if (!$this->testCase instanceof Injectable) {
            return null;
        }

        $arguments = $this->objectManager->prepareArguments($this->testCase, $this->testCase->getName(false));
        foreach ($arguments as $argument) {
            if ($argument instanceof $value) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check whether test case is injectable or regular
     *
     * @param string $value
     * @return bool
     */
    protected function typeMatch($value)
    {
        if ($this->testCase instanceof Injectable) {
            $type = 'injectable';
        } else {
            $type = 'regular';
        }
        return $type === $value;
    }
}
