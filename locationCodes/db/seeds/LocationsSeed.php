<?php


class LocationsSeed extends JsonSeed
{
    protected function init()
    {
        $this->setJsonFileName(__DIR__ . DIRECTORY_SEPARATOR . '../../locations.json');
    }


    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = $this->getExternalData();

        $countries = $this->table('countries');
        $countries->insert($data['countries'])->save();


        $cities = $this->table('cities');
        $cities->insert($data['cities'])->save();

    }
}
