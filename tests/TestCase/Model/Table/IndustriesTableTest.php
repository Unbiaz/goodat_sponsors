<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IndustriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IndustriesTable Test Case
 */
class IndustriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IndustriesTable
     */
    public $Industries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.industries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Industries') ? [] : ['className' => IndustriesTable::class];
        $this->Industries = TableRegistry::get('Industries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Industries);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
