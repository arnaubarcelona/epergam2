<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PublishersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PublishersTable Test Case
 */
class PublishersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PublishersTable
     */
    public $Publishers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.publishers',
        'app.documents',
        'app.cdus',
        'app.formats',
        'app.collections',
        'app.publication_places',
        'app.countries',
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
        $config = TableRegistry::exists('Publishers') ? [] : ['className' => PublishersTable::class];
        $this->Publishers = TableRegistry::get('Publishers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Publishers);

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
