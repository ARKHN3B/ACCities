<?php

# GIE said General Infos Establishment
class GIERepository extends ModelRepository {

    public function insert(GIE $gie)
    {
        $connection = $this->_connection;
        $query = 'INSERT INTO general_infos_establishment SET 
                  tradeName = :tradeName,
                  socialReason = :socialReason,
                  responsibleName = :responsibleName,
                  firstAddress = :firstAddress,
                  optionnalAddress = :optionnalAddress,
                  villesFranceID = :villesFranceID,
                  siret = :siret,
                  tel = :tel,
                  email = :email,
                  websiteUrl = :websiteUrl,
                  furtherInfosID = :furtherInfosID 
                  ';

        $request = $connection->prepare($query);
        $request->execute(array(
            'tradeName' => $gie->getTradeName(),
            'socialReason' => $gie->getSocialReason(),
            'responsibleName' => $gie->getResponsibleName(),
            'firstAddress' => $gie->getFirstAddress(),
            'optionnalAddress' => $gie->getOptionnalAddress(),
            'villesFranceID' => $gie->getVillesFranceID(),
            'siret' => $gie->getSiret(),
            'tel' => $gie->getTel(),
            'email' => $gie->getEmail(),
            'websiteUrl' => $gie->getWebsiteUrl(),
            'furtherInfosID' => $gie->getFurtherInfosID(),
        ));

        return $connection->lastInsertId();
    }

    /**
     * Check if the id is present and if furtherInfosID is NULL
     * @param $id
     * @return mixed
     */
    public function check($id)
    {
        $connection = $this->_connection;
        $query = 'SELECT id FROM general_infos_establishment WHERE id = :id AND furtherInfosID IS NULL';

        $request = $connection->prepare($query);
        $request->execute(array(
            'id' => $id
        ));

        return $request->fetch(PDO::FETCH_ASSOC);
    }
}