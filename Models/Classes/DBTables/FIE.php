<?php

# Further Infos Establishment
class FIE extends DBModel {

    protected $_id ;
    protected $_visitDate ;
    protected $_dateDocumentIssue ;
    protected $_currentRanking ;
    protected $_rankingRequest ;
    protected $_numberRooms ;
    protected $_numberFloors ;
    protected $_numberBuildings ;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getVisitDate()
    {
        return $this->_visitDate;
    }

    /**
     * @param mixed $visitDate
     */
    public function setVisitDate($visitDate): void
    {
        $this->_visitDate = $visitDate;
    }

    /**
     * @return mixed
     */
    public function getDateDocumentIssue()
    {
        return $this->_dateDocumentIssue;
    }

    /**
     * @param mixed $dateDocumentIssue
     */
    public function setDateDocumentIssue($dateDocumentIssue): void
    {
        $this->_dateDocumentIssue = $dateDocumentIssue;
    }

    /**
     * @return mixed
     */
    public function getCurrentRanking()
    {
        return $this->_currentRanking;
    }

    /**
     * @param mixed $currentRanking
     */
    public function setCurrentRanking($currentRanking): void
    {
        $this->_currentRanking = $currentRanking;
    }

    /**
     * @return mixed
     */
    public function getRankingRequest()
    {
        return $this->_rankingRequest;
    }

    /**
     * @param mixed $rankingRequest
     */
    public function setRankingRequest($rankingRequest): void
    {
        $this->_rankingRequest = $rankingRequest;
    }

    /**
     * @return mixed
     */
    public function getNumberRooms()
    {
        return $this->_numberRooms;
    }

    /**
     * @param mixed $numberRooms
     */
    public function setNumberRooms($numberRooms): void
    {
        $this->_numberRooms = $numberRooms;
    }

    /**
     * @return mixed
     */
    public function getNumberFloors()
    {
        return $this->_numberFloors;
    }

    /**
     * @param mixed $numberFloors
     */
    public function setNumberFloors($numberFloors): void
    {
        $this->_numberFloors = $numberFloors;
    }

    /**
     * @return mixed
     */
    public function getNumberBuildings()
    {
        return $this->_numberBuildings;
    }

    /**
     * @param mixed $numberBuildings
     */
    public function setNumberBuildings($numberBuildings): void
    {
        $this->_numberBuildings = $numberBuildings;
    }
}