<?php

class PetRepository extends AbstractRepository
{
    /**
     * @return bool
     */
    public function insert()
    {
        $sql = "INSERT INTO
                    pet (name, category_id, status_id)
                VALUES('{$this->Object->getName()}', {$this->Object->getcategoryID()}, {$this->Object->getStatusID()})";

        return (!$this->getConnection() || $this->db->query($sql) !== TRUE) ? false : true;
    }

    /**
     * @param array $filter
     * @return array|bool|null
     */
    public function retrieve($filter)
    {
        $result = false;
        $sql = "SELECT 
                    p.name,
                    c.name as category,
                    s.name as status
                FROM
                    pet p
                JOIN
                    category c
                ON
                    p.category_id = c.category_id
                JOIN
                    status s
                ON
                    p.status_id = s.status_id";
        if (isset($filter['status_id'])) {
            $sql .= "
                    WHERE
                        p.status_id = {$filter['status_id']}";
        } else if (isset($filter['pet_id'])) {
            $sql .= "
                    WHERE
                        p.pet_id = {$filter['pet_id']}";
        }

        if ($this->getConnection()) {
            $result = $this->db->query($sql)->fetch_assoc();
        }
        return $result;
    }

    /**
     * @return bool
     */
    public function delete()
    {
        $sql = "DELETE FROM
                    pet
                WHERE
                    pet_id = {$this->Object->getPetID()}";
        return (!$this->getConnection() || $this->db->query($sql) !== TRUE) ? false : true;
    }

    /**
     * @param array $setData
     * @return bool
     */
    public function update($setData)
    {
        $sql = "UPDATE 
                    pet
                SET";
        $comma = " ";
        if (isset($setData['status_id'])) {
            $sql .= "
                        status_id = {$setData['status_id']}";
            $comma = ",";
        }
        if (isset($setData['name'])) {
            $sql .= "{$comma}
                        name = '{$setData['name']}'";
        }
        $sql .= "
                WHERE
                    pet_id = {$setData['pet_id']}";

        return (!$this->getConnection() || $this->db->query($sql) !== TRUE) ? false : true;
    }
}