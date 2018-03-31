<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CdusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CdusTable Test Case
 */
class CdusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CdusTable
     */
    public $Cdus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cdus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Cdus') ? [] : ['className' => CdusTable::class];
        $this->Cdus = TableRegistry::get('Cdus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cdus);

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
