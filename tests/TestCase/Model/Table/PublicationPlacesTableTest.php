<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublicationPlacesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublicationPlacesTable Test Case
 */
class PublicationPlacesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublicationPlacesTable
     */
    public $PublicationPlaces;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publication_places',
        'app.countries',
        'app.documents',
        'app.cdus',
        'app.formats',
        'app.collections',
        'app.locations',
        'app.catalogue_states',
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
        $config = TableRegistry::exists('PublicationPlaces') ? [] : ['className' => PublicationPlacesTable::class];
        $this->PublicationPlaces = TableRegistry::get('PublicationPlaces', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PublicationPlaces);

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
