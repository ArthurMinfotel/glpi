<?php
/**
 * ---------------------------------------------------------------------
 *
 * GLPI - Gestionnaire Libre de Parc Informatique
 *
 * http://glpi-project.org
 *
 * @copyright 2015-2025 Teclib' and contributors.
 * @copyright 2003-2014 by the INDEPNET Development Team.
 * @licence   https://www.gnu.org/licenses/gpl-3.0.html
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * ---------------------------------------------------------------------
 */
class Entity_ITILFollowupTemplate extends CommonDBRelation
{
    // From CommonDBRelation
    public static $itemtype_1          = 'ITILFollowupTemplate';
    public static $items_id_1          = 'itilfollowuptemplates_id';
    public static $itemtype_2          = 'Entity';
    public static $items_id_2          = 'entities_id';
    public static $checkItem_2_Rights  = self::DONT_CHECK_ITEM_RIGHTS;
    public static $logs_for_item_2     = false;
    /**
     * @param ITILFollowupTemplate $template ITILFollowupTemplate instance
     *
     * @return array of entities
     **/
    public static function getEntities($template)
    {
        /** @var \DBmysql $DB */
        global $DB;
        $ent   = [];
        $iterator = $DB->request([
            'FROM'   => self::getTable(),
            'WHERE'  => [
                self::$items_id_1 => $template->fields['id']
            ]
        ]);
        foreach ($iterator as $data) {
            $ent[$data[self::$items_id_2]][] = $data;
        }
        return $ent;
    }
}
