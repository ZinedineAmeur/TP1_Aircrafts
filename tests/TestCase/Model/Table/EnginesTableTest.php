<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnginesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnginesTable Test Case
 */
class EnginesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnginesTable
     */
    public $Engines;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Engines',
        'app.Aircrafts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Engines') ? [] : ['className' => EnginesTable::class];
        $this->Engines = TableRegistry::getTableLocator()->get('Engines', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Engines);

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
