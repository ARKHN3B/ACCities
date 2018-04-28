<?php
/**
 * Created by PhpStorm.
 * User: benlmsc
 * Date: 16/04/2018
 * Time: 12:43 PM
 */

class DBModel {
    /**
     * DBModel constructor.
     * @param array $data
     */
    public function __construct($data = array() )
    {
        $this->hydrate($data);
    }

    /**
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $key = preg_replace('#_#', '', $key);

            $method = 'set' . ucfirst($key);
            if ( method_exists($this, $method) )
                $this->$method($value);
        }
    }
}