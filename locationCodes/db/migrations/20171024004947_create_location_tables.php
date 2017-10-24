<?php


use Phinx\Migration\AbstractMigration;

class CreateLocationTables extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $countries = $this->table('countries');
        $countries->addColumn('name', 'string')
            ->save();


        $cities = $this->table('cities');

        $cities->addColumn('country_id', 'integer')
            ->addColumn('name', 'string')
            ->addColumn('code', 'string')
            ->addForeignKey('country_id', 'countries')
            ->save();
    }
}
