<?php

class Pet
{
    /**
     * @var integer
     */
    protected $petID;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     * @references category.category_id
     */
    protected $categoryID;

    /**
     * @var integer
     * @references status.status_id
     */
    protected $statusID;

    /**
     * @return int
     */
    public function getPetID()
    {
        return $this->petID;
    }

    /**
     * @param int $petID
     * @return Pet
     */
    public function setPetID($petID)
    {
        $this->petID = $petID;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Pet
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getCategoryID()
    {
        return $this->categoryID;
    }

    /**
     * @param int $categoryID
     * @return Pet
     */
    public function setCategoryID($categoryID)
    {
        $this->categoryID = $categoryID;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusID()
    {
        return $this->statusID;
    }

    /**
     * @param int $statusID
     * @return Pet
     */
    public function setStatusID($statusID)
    {
        $this->statusID = $statusID;
        return $this;
    }
}