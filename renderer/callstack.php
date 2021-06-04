<?php

use ComboStrap\PluginUtility;


/**
 * Dump the call stack
 */
class renderer_plugin_dump_callstack extends Doku_Renderer
{

    const NAME = "dump_callstack";

    public function getFormat()
    {
        return "callstack";
    }

    /**
     * Adapted from {@link p_wiki_xhtml()}
     */
    public function document_start()
    {
        global $ID;
        global $REV;
        global $INFO;

        if (
            auth_quickaclcheck($ID) >= AUTH_READ
            && $INFO['isadmin']
        ) {

            $file = wikiFN($ID, $REV);
            $ins = p_cached_instructions($file, false, $ID);
            $body = json_encode($ins, JSON_PRETTY_PRINT);
            header("Content-Type: application/json; charset=utf-8");
            header("X-Robots-Tag: noindex");
            echo $body;

        } else {

            http_status(403);
        }

        exit;

    }


}

