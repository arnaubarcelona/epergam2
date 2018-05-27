<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MassivesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MassivesTable Test Case
 */
class MassivesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MassivesTable
     */
    public $Massives;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.massives',
        'app.locations',
        'app.documents',
        'app.cdus',
        'app.formats',
        'app.collections',
        'app.publication_places',
        'app.countries',
        'app.catalogue_states',
        'app.conservation_states',
        'app.lending_states',
        'app.lendings',
        'app.users',
        'app.groups',
        'app.lending_policies',
        'app.subscription_states',
        'app.set_lending_users',
        'app.set_return_users',
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
        'app.documents_subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Massives') ? [] : ['className' => MassivesTable::class];
        $this->Massives = TableRegistry::get('Massives', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Massives);

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
