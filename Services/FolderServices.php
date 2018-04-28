<?php

class FolderServices {

    public $_dbm;

    /**
     * AuthServices constructor.
     * @param DBManager $dbm
     */
    public function __construct(DBManager $dbm)
    {
        $this->_dbm = $dbm;
    }

    public function createFolder(array $array)
    {
        // Unset the html tags
        $array = array_map(function ($value) {
            return strip_tags($value);
        }, $array);

        // Get the ville_id by postal code
        $vff_repo = $this->_dbm->getVffRepository();
        $result = $vff_repo->get_by_postalcode($array['postalCode']);

        // Replace postalCode by villesFranceID
        $array['villesFranceID'] = $result[0]['ville_id'];
        unset($array['postalCode']);

        $gie = new GIE($array);

        $gie_repo = $this->_dbm->getGieRepository();
        $result = $gie_repo->insert($gie);

        return $result;
    }
}