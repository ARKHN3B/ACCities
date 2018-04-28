<?php
# GIE said General Infos Establishment
class GIE extends DBModel {

    protected $_id;
    protected $_tradeName;
    protected $_socialReason;
    protected $_responsibleName;
    protected $_firstAddress;
    protected $_optionnalAddress;
    protected $_villesFranceID;
    protected $_siret;
    protected $_tel;
    protected $_email;
    protected $_websiteUrl;
    protected $_furtherInfosID;

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
    public function getTradeName()
    {
        return $this->_tradeName;
    }

    /**
     * @param mixed $tradeName
     */
    public function setTradeName($tradeName): void
    {
        $this->_tradeName = $tradeName;
    }

    /**
     * @return mixed
     */
    public function getSocialReason()
    {
        return $this->_socialReason;
    }

    /**
     * @param mixed $socialReason
     */
    public function setSocialReason($socialReason): void
    {
        $this->_socialReason = $socialReason;
    }

    /**
     * @return mixed
     */
    public function getResponsibleName()
    {
        return $this->_responsibleName;
    }

    /**
     * @param mixed $responsibleName
     */
    public function setResponsibleName($responsibleName): void
    {
        $this->_responsibleName = $responsibleName;
    }

    /**
     * @return mixed
     */
    public function getFirstAddress()
    {
        return $this->_firstAddress;
    }

    /**
     * @param mixed $firstAddress
     */
    public function setFirstAddress($firstAddress): void
    {
        $this->_firstAddress = $firstAddress;
    }

    /**
     * @return mixed
     */
    public function getOptionnalAddress()
    {
        return $this->_optionnalAddress;
    }

    /**
     * @param mixed $optionnalAddress
     */
    public function setOptionnalAddress($optionnalAddress): void
    {
        $this->_optionnalAddress = $optionnalAddress;
    }

    /**
     * @return mixed
     */
    public function getVillesFranceID()
    {
        return $this->_villesFranceID;
    }

    /**
     * @param mixed $villesFranceID
     */
    public function setVillesFranceID($villesFranceID): void
    {
        $this->_villesFranceID = intval($villesFranceID);
    }

    /**
     * @return mixed
     */
    public function getSiret()
    {
        return $this->_siret;
    }

    /**
     * @param mixed $siret
     */
    public function setSiret($siret): void
    {
        $this->_siret = $siret;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->_tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        $this->_tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getWebsiteUrl()
    {
        return $this->_websiteUrl;
    }

    /**
     * @param mixed $websiteUrl
     */
    public function setWebsiteUrl($websiteUrl): void
    {
        $this->_websiteUrl = $websiteUrl;
    }

    /**
     * @return mixed
     */
    public function getFurtherInfosID()
    {
        return $this->_furtherInfosID;
    }

    /**
     * @param mixed $furtherInfosID
     */
    public function setFurtherInfosID($furtherInfosID): void
    {
        $this->_furtherInfosID = intval($furtherInfosID);
    }
}