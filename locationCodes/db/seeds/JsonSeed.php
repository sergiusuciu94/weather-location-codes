<?php


use Phinx\Seed\AbstractSeed;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class JsonSeed extends AbstractSeed
{

    protected $jsonFileName;

    protected $externalData;

    public function setJsonFileName($file)
    {
    	if(!(new FileSystem)->exists($file)) {
    		throw new FileNotFoundException(sprintf('Failed to set JsonFileName because file "%s" does not exist.', $file), 0, null, $file);
    	}
    	$this->jsonFileName = $file;
    	$this->loadExternalFile();
    }
    public function getExternalData()
    {

        $countries = [];
        $cities = [];
        foreach ($this->externalData as $index => $data) {
            $countries[] = [
                'name' => ucwords(trim($data['url'], '/')),
                'id' => intval($index) + 1
            ];
            for ($i = 0; $i < count($data['city']); $i++) {
                $cities[] = [
                    'name' => $data['city'][$i],
                    'code' => $data['codes'][$i],
                    'country_id' => intval($index) + 1
                ];
            }
        }
    	return ['countries' => $countries, 'cities' => $cities];
    }
    private function loadExternalFile()
    {
    	$this->externalData = json_decode(file_get_contents($this->jsonFileName), true);
    }

}
