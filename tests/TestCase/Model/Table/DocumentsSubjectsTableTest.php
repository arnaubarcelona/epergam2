<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DocumentsSubjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DocumentsSubjectsTable Test Case
 */
class DocumentsSubjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DocumentsSubjectsTable
     */
    public $DocumentsSubjects;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.documents_subjects',
        'app.documents',
        'app.cdus',
        'app.formats',
        'app.collections',
        'app.publication_places',
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
        'app.subjects'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DocumentsSubjects') ? [] : ['className' => DocumentsSubjectsTable::class];
        $this->DocumentsSubjects = TableRegistry::get('DocumentsSubjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DocumentsSubjects);

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
