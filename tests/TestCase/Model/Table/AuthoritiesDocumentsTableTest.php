<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AuthoritiesDocumentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AuthoritiesDocumentsTable Test Case
 */
class AuthoritiesDocumentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AuthoritiesDocumentsTable
     */
    public $AuthoritiesDocuments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.authorities_documents',
        'app.authorities',
        'app.documents'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AuthoritiesDocuments') ? [] : ['className' => AuthoritiesDocumentsTable::class];
        $this->AuthoritiesDocuments = TableRegistry::get('AuthoritiesDocuments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AuthoritiesDocuments);

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
