<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LendingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LendingsTable Test Case
 */
class LendingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LendingsTable
     */
    public $Lendings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.lendings',
        'app.documents',
        'app.cdus',
        'app.formats',
        'app.collections',
        'app.publication_places',
        'app.countries',
        'app.locations',
        'app.catalogue_states',
        'app.conservation_states',
        'app.authorities',
        'app.authors',
        'app.author_types',
        'app.authorities_documents',
        'app.languages',
        'app.documents_languages',
        'app.levels',
        'app.documents_levels',
        'app.publishers',
        'app.documents_publishers',
        'app.subjects',
        'app.documents_subjects',
        'app.users',
        'app.groups',
        'app.lending_policies',
        'app.groups_lending_policies',
        'app.subscription_states',
        'app.set_lending_users',
        'app.set_return_users',
        'app.lending_states'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Lendings') ? [] : ['className' => LendingsTable::class];
        $this->Lendings = TableRegistry::get('Lendings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lendings);

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
