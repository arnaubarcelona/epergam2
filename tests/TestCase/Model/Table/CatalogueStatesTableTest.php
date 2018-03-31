<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatalogueStatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatalogueStatesTable Test Case
 */
class CatalogueStatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatalogueStatesTable
     */
    public $CatalogueStates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.catalogue_states',
        'app.documents',
        'app.cdus',
        'app.formats',
        'app.collections',
        'app.publication_places',
        'app.locations',
        'app.conservation_states',
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
        $config = TableRegistry::exists('CatalogueStates') ? [] : ['className' => CatalogueStatesTable::class];
        $this->CatalogueStates = TableRegistry::get('CatalogueStates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatalogueStates);

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
