<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConservationStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConservationStatesTable Test Case
 */
class ConservationStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConservationStatesTable
     */
    public $ConservationStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.conservation_states',
        'app.documents',
        'app.cdus',
        'app.formats',
        'app.collections',
        'app.publication_places',
        'app.locations',
        'app.catalogue_states',
        'app.lendings',
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
        $config = TableRegistry::exists('ConservationStates') ? [] : ['className' => ConservationStatesTable::class];
        $this->ConservationStates = TableRegistry::get('ConservationStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConservationStates);

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
