<?php
# Villes France free
class VFFRepository extends ModelRepository {

    /**
     * Fetching id, name and postal code of cities in table villes_france_free
     * @return array
     */
    public function select()
    {
        $connection = $this->_connection;
        $query = 'SELECT ville_id, ville_nom, ville_code_postal FROM villes_france_free';

        $request = $connection->query($query);

        $data = $request->fetchAll(PDO::FETCH_ASSOC);

        return $data ?: ['error' => INTERNAL_SERVER_ERROR];
    }


    /**
     * @param string $code | Equals postal code
     * @return mixed | Returns an array which contains an id of ouf city
     */
    public function get_by_postalcode(string $code)
    {
        $connection = $this->_connection;
        $query = '
        SELECT ville_id FROM villes_france_free
        WHERE (ville_code_postal REGEXP :postalcode)
        ';

        $request = $connection->prepare($query);
        $request->execute(array(
            'postalcode' => $code
        ));

        // Returns the id of our city
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }
}