<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubscriptionStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubscriptionStatesTable Test Case
 */
class SubscriptionStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubscriptionStatesTable
     */
    public $SubscriptionStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subscription_states',
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
        $config = TableRegistry::exists('SubscriptionStates') ? [] : ['className' => SubscriptionStatesTable::class];
        $this->SubscriptionStates = TableRegistry::get('SubscriptionStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SubscriptionStates);

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
