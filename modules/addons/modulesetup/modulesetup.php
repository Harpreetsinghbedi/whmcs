<?php

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *  Module setup Addon Module By whmcsglobalservices.com
 *
 *  Date: 18 february, 2020
 *  WHMCS Version: v6,v7
 *
 *  By WHMCSGLOBALSERVICES    https://whmcsglobalservices.com
 *
 *  In this module you can set up your selling module
 *
 *  @owner <whmcsglobalservices.com>
 *  @author <WHMCS GLOBAL SERVICES>
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

if (file_exists(__DIR__ . '/classes/class.php'))
    require_once __DIR__ . '/classes/class.php';

/*
 *  Module configure
 *  */

function modulesetup_config()
{
    $configarray = array(
        "name" => "Selling Module Setup Addon",
        "description" => "In this module you can set up your selling module",
        "version" => "1.0",
        "author" => "WHMCS GLOBAL SERVICES",
        "language" => "english",
    );
    return $configarray;
}

/*
 *  Module activate
 *  */

function modulesetup_activate()
{
    # Create Custom DB Table
    $query = "CREATE TABLE IF NOT EXISTS `mod_modulesetup` (
				`id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
				`name` VARCHAR( 255 ) NOT NULL ,
				`desc` VARCHAR( 500 ) NOT NULL ,
				`overview` VARCHAR( 555 ) NOT NULL ,
				`order` VARCHAR( 255 ) NOT NULL
				) ENGINE = MYISAM";
    $result = mysql_query($query);

    # Return Result
    return array('status' => 'success', 'description' => 'Activated successfully.');
}

/*
 *  Module deactivate
 *  */

function modulesetup_deactivate()
{
    # Delete Custom DB Table
    $query = "DROP TABLE `mod_modulesetup`";
    $result = mysql_query($query);

    # Return Result
    return array('status' => 'success', 'description' => 'Activated successfully.');
}

/*
 *  Module output
 *  */

function modulesetup_output($vars)
{
    echo '<script type="text/javascript" language="javascript" src="../modules/addons/modulesetup/js/jquery.js"></script>';
    echo '<link rel="stylesheet" type="text/css" href="../modules/addons/modulesetup/css/style.css">';


    $modulelink = $vars['modulelink'];
    $LANG = $vars['_lang'];

    $object = new Modulesetup($vars);

    if (isset($_REQUEST["action"])) {
        if (file_exists(__DIR__ . '/includes/' . $_REQUEST["action"] . '.php')) {
            require_once __DIR__ . '/includes/' . $_REQUEST["action"] . '.php';
        }
    } else {
        if (file_exists(__DIR__ . '/includes/' . 'homepage.php')) {
            require_once __DIR__ . '/includes/' . 'homepage.php';
        }
    }
}
