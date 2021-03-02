<?php

/*
Author: http://whmcsglobalservices.com/
Date: 05 Dec, 2020

This hook script will remove the Client Area Primary Navbar Links
*/

use WHMCS\View\Menu\Item as MenuItem;

add_hook('ClientAreaPrimaryNavbar', 1, function (MenuItem $primaryNavbar) {
    if (isset($_SESSION['uid'])) {
        if (!is_null($primaryNavbar->getChild('Services'))) {
            $primaryNavbar->getChild('Services')->removeChild('View Available Addons');
        }
        if (!is_null($primaryNavbar->getChild('Billing'))) {
            $primaryNavbar->getChild('Billing')->removeChild('My Quotes');
            $primaryNavbar->getChild('Billing')->removeChild('Mass Payment');
        }
        if (!is_null($primaryNavbar->getChild('Support'))) {
            $primaryNavbar->getChild('Support')->removeChild('Downloads');
            $primaryNavbar->getChild('Support')->removeChild('Network Status');
            $primaryNavbar->getChild('Support')->removeChild('Announcements');
            $primaryNavbar->getChild('Support')->removeChild('Knowledgebase');
        }
    }
});
