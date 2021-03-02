<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *  Module setup Addon Module By whmcsglobalservices.com
 *
 *  Date: 18 february, 2020
 *  WHMCS Version: v6,v7
 *
 *  By WHMCSGLOBALSERVICES    https://whmcsglobalservices.com
 *
 *  Module class file to manage all functions.
 *
 *  @owner <whmcsglobalservices.com>
 *  @author <WHMCS GLOBAL SERVICES>
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

class Modulesetup
{

    private $apiUrl;
    private $apiKey;
    private $table;

    public function __construct()
    {
        $this->table = 'mod_modulesetup';
    }

    # Save Data in db

    public function saveData($postData)
    {
        $values = array('name' => $postData['name'], 'desc' => $postData['desc'], 'overview' => $postData['overview'], 'order' => $postData['order']);
        insert_query($this->table, $values);
    }

    # Get data from db

    public function getData($id = NULL)
    {
        if (!empty($id))
            $query = select_query($this->table, '*', array('id' => $id));
        else
            $query = select_query($this->table, '*', array());

        $data = array();
        while ($result = mysql_fetch_assoc($query)) {
            $data[] = $result;
        }
        return array('result' => $data, 'rows' => mysql_num_rows($query));
    }

    # Update data in db

    public function updateDetail($postData)
    {
        if (!empty($postData['id'])) {
            $values = array('name' => $postData['name'], 'desc' => $postData['desc'], 'overview' => $postData['overview'], 'order' => $postData['order']);
            update_query($this->table, $values, array('id' => $postData['id']));
            return 'success';
        } else {
            return 'Error: Id is missing!';
        }
    }

    # Delete data from db

    public function deleteData($id)
    {
        if (!empty($id))
            $query = mysql_query("DELETE FROM $this->table WHERE `id` = '" . $id . "'") or die(mysql_error());

        return $query;
    }
}
