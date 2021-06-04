<?php
/**
 * Copyright (c) 2021. ComboStrap, Inc. and its affiliates. All Rights Reserved.
 *
 * This source code is licensed under the GPL license found in the
 * COPYING  file in the root directory of this source tree.
 *
 * @license  GPL 3 (https://www.gnu.org/licenses/gpl-3.0.en.html)
 * @author   ComboStrap <support@combostrap.com>
 *
 */

namespace ComboStrap;

use dokuwiki\Menu\Item\AbstractItem;


/**
 * Class MenuItem
 * *
 * @package ComboStrap
 *
 */
class CallStackMenuItem extends AbstractItem {

    const ITEM_ID = \renderer_plugin_dump_callstack::NAME . "_item_id";


    /** @var string do action for this plugin */
    protected $type = 'export_'. \renderer_plugin_dump_callstack::NAME;



    /**
     *
     * @return string
     */
    public function getLabel() {
        return "CallStack";
    }

    public function getLinkAttributes($classprefix = 'menuitem ')
    {
        $linkAttributes = parent::getLinkAttributes($classprefix);
        $linkAttributes['id']= self::ITEM_ID;
        return $linkAttributes;
    }

    public function getTitle()
    {
        return "Show the CallStack of this page";
    }

    public function getSvg()
    {
        /** @var string icon file */
        return DOKU_PLUGIN . "dump/resources/image/stack.svg";
    }


}
