<?php

class PetController extends AbstractController
{
    /**
     * @param array $data
     * @return bool
     */
    protected function insertData($data)
    {
        $Pet = new Pet();
        $Pet->setName($data['name'])
            ->setCategoryID($data['category_id'])
            ->setStatusID($data['status_id']);
        $PetRepository = new PetRepository();
        $PetRepository->setObject($Pet);
        $success = $PetRepository->insert();
        if ($success) {
            $this->response = 'Successfully Created';
        } else {
            $this->response = 'Error Processing Request';
            $this->code = 500;
        }
        return $success;
    }

    /**
     * @param array $filterData
     * @return bool
     */
    protected function retrieveData($filterData)
    {
        $PetRepository = new PetRepository();
        $data = $PetRepository->retrieve($filterData);
        if (empty($data)) {
            $this->response = 'Error Processing Request';
            $this->code = 500;
            return false;
        }
        $this->response = $data;
        return true;
    }

    /**
     * @param array $filterData
     * @return bool
     */
    protected function deleteData($filterData)
    {
        $Pet = new Pet();
        $Pet->setPetID($filterData['pet_id']);
        $PetRepository = new PetRepository();
        $PetRepository->setObject($Pet);
        $success = $PetRepository->delete();
        if ($success) {
            $this->response = 'Successfully Deleted';
        } else {
            $this->response = 'Error Processing Request';
            $this->code = 500;
        }
        return $success;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function updateData($data)
    {
        $PetRepository = new PetRepository();
        $success = $PetRepository->update($data);
        if ($success) {
            $this->response = 'Successfully Updated';
        } else {
            $this->response = 'Error Processing Request';
            $this->code = 500;
        }
        return $success;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function validateInsertRequestData($data)
    {
        if (
            (!isset($data['name']) || empty($data['name']))
            ||(!isset($data['category_id']) || empty($data['category_id']))
            ||(!isset($data['status_id']) || empty($data['status_id']))
        ){
            return false;
        }
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function validateRetrieveRequestData($data)
    {
        if (
            (!isset($data['pet_id']) || empty($data['pet_id']))
            && (!isset($data['status_id']) || empty($data['status_id']))
        ) {
            return false;
        }
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function validateDeleteRequestData($data)
    {
        if (!isset($data['pet_id']) || empty($data['pet_id'])) {
            return false;
        }
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function validateUpdateRequestData($data)
    {
        if (
            (!isset($data['pet_id']) || empty($data['pet_id']))
            ||(
                (!isset($data['status_id']) || empty($data['status_id']))
                &&(!isset($data['name']) || empty($data['name']))
            )
        ){
            return false;
        }
        return true;
    }
}