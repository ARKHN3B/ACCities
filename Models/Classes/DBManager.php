<?php

class DBManager {
    protected $_connection;
    protected $_usersRepository;
    protected $_gieRepository;
    protected $_vffRepository;

    /**
     * DBManager constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->_connection = DBConnection::setConnection($config);
        $this->setUsersRepository( new UsersRepository($this->_connection) );
        $this->setGieRepository( new GIERepository($this->_connection) );
        $this->setVffRepository( new VFFRepository($this->_connection) );
    }

    /**
     * @return mixed
     */
    public function getUsersRepository()
    {
        return $this->_usersRepository;
    }

    /**
     * @param mixed $usersRepository
     */
    public function setUsersRepository($usersRepository): void
    {
        $this->_usersRepository = $usersRepository;
    }

    /**
     * @return mixed
     */
    public function getGieRepository()
    {
        return $this->_gieRepository;
    }

    /**
     * @param mixed $gieRepository
     */
    public function setGieRepository($gieRepository): void
    {
        $this->_gieRepository = $gieRepository;
    }

    /**
     * @return mixed
     */
    public function getVffRepository()
    {
        return $this->_vffRepository;
    }

    /**
     * @param mixed $vffRepository
     */
    public function setVffRepository($vffRepository): void
    {
        $this->_vffRepository = $vffRepository;
    }

}