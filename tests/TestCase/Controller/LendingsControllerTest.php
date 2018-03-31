<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LendingsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\LendingsController Test Case
 */
class LendingsControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
