<?php

require_once(__DIR__ . "/../class/CallStackMenuItem.php");

use ComboStrap\CallStackMenuItem;

class action_plugin_dump_menu extends DokuWiki_Action_Plugin
{


    public function register(Doku_Event_Handler $controller)
    {

        /**
         * Add a icon in the page tools menu
         * https://www.dokuwiki.org/devel:event:menu_items_assembly
         */
        $controller->register_hook('MENU_ITEMS_ASSEMBLY', 'AFTER', $this, 'handle_page_tools');


    }


    public function handle_page_tools(Doku_Event $event, $param)
    {

        global $ID;

        if (auth_quickaclcheck($ID) < AUTH_READ) {
            return;
        }

        global $INFO;
        if (!$INFO['isadmin']) {
            return;
        }

        /**
         * The `view` property defines the menu that is currently built
         * https://www.dokuwiki.org/devel:menus
         * If this is not the page menu, return
         */
        if ($event->data['view'] != 'page') return;

        global $INFO;
        if (!$INFO['exists']) {
            return;
        }
        array_splice($event->data['items'], -1, 0, array(new CallStackMenuItem()));

    }


}



