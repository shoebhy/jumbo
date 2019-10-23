<?php

class AbstractController
{
    /**
     * @var int
     */
    protected $code = 200;
    /**
     * @var string
     */
    protected $response;

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Handles the service requested
     * @param array $apiParams
     */
    public function handleAPIRequest($apiParams)
    {
        //validate the params
        if (!$this->validateParams($apiParams)) {
            return;
        }
        $action = $apiParams['Action'];
        //can delete the following entries, will help later when writing dynamic queries
        unset($apiParams['Action']);
        unset($apiParams['Service']);
        //perform the action
        if ($action === 'Add') {
            $this->insertData($apiParams);
        } else if ($action === 'Retrieve') {
            $this->retrieveData($apiParams);
        } else if ($action === 'Delete') {
            $this->deleteData($apiParams);
        } else if ($action === 'Update') {
            $this->updateData($apiParams);
        }
    }

    /**
     * Validates the API request params
     * @param array $apiParams
     * @return bool
     */
    protected function validateParams($apiParams)
    {
        $validated = false;
        //check if the action is specified
        if (!isset($apiParams['Action']) && empty($apiParams['Action'])) {
            $this->code = 400;
            $this->response = 'Invalid Action';
        } else {
            //validate the params submitted
            if ($apiParams['Action'] === 'Add') {
                $validated = $this->validateInsertRequestData($apiParams);
            } else if ($apiParams['Action'] === 'Retrieve') {
                $validated = $this->validateRetrieveRequestData($apiParams);
            } else if ($apiParams['Action'] === 'Delete') {
                $validated = $this->validateDeleteRequestData($apiParams);
            } else if ($apiParams['Action'] === 'Update') {
                $validated = $this->validateUpdateRequestData($apiParams);
            }
            if (!$validated) {
                $this->code = 400;
                $this->response = 'Invalid Data';
            }
        }
        return $validated;
    }
}