<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthorTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthorTypesTable Test Case
 */
class AuthorTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthorTypesTable
     */
    public $AuthorTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.author_types',
        'app.authorities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthorTypes') ? [] : ['className' => AuthorTypesTable::class];
        $this->AuthorTypes = TableRegistry::get('AuthorTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthorTypes);

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
