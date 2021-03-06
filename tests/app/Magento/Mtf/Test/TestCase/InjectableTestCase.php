<?php
/**
 * {license_notice}
 *
 * @copyright   {copyright}
 * @license     {license_link}
 */

namespace Magento\Mtf\Test\TestCase;

use Magento\Mtf\Test\Fixture\Test;
use Mtf\TestCase\Injectable;
use Magento\Mtf\Test\Page\Area\TestPage;

/**
 * Class InjectableTestCase
 *
 * @package Magento\Mtf\Test\TestCase
 */
class InjectableTestCase extends Injectable
{
    /**
     * @param TestPage $page
     * @param Test $fixture
     * @return void
     */
    public function test1(TestPage $page, Test $fixture)
    {
        $page->open();
        $page->getTestBlock()->click($fixture);
        sleep(2);
    }

    /**
     * @param TestPage $page
     * @param Test $fixture
     * @return void
     */
    public function test2(TestPage $page, Test $fixture)
    {
        $page->open();
        $page->getTestBlock()->click($fixture);
        sleep(2);
    }

    /**
     * @param string $fromDataProvider
     * @dataProvider dataProvider
     * @return void
     */
    public function test3($fromDataProvider = '')
    {
        var_dump($fromDataProvider . " works well!");
        sleep(2);
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return array(
            'Variation #1' => array('Data Variation 1 for Injectable Test Case'),
            'Variation #2' => array('Data Variation 2 for Injectable Test Case')
        );
    }

    /**
     * Incomplete Test
     * @return void
     */
    public function test4()
    {
        $this->markTestIncomplete('Incomplete Test');
    }

    /**
     * Incomplete Test
     * @return void
     */
    public function test5()
    {
        $this->markTestSkipped('Skipped Test');
    }

    /**
     * Filtered Test, see TestRunner.xml
     *
     * @param \Mtf\ObjectManager $objectManager
     * @return void
     */
    public function test6(\Mtf\ObjectManager $objectManager)
    {
        //
    }

    /**
     * Test form filling
     *
     * @param TestPage $page
     * @param Test $fixture
     * @return void
     */
    public function test7(TestPage $page, Test $fixture)
    {
        $page->open();
        $page->getTestBlock()->search($fixture);
        sleep(2);
    }
}
