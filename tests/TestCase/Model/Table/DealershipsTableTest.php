<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DealershipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DealershipsTable Test Case
 */
class DealershipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DealershipsTable
     */
    public $Dealerships;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dealerships',
        'app.creator',
        'app.editor',
        'app.groups',
        'app.jobs',
        'app.checkins',
        'app.checkouts',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dealerships') ? [] : ['className' => 'App\Model\Table\DealershipsTable'];
        $this->Dealerships = TableRegistry::get('Dealerships', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dealerships);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
