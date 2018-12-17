<?php
/**
 * -------------------------------------------------------
 *	 ____          _        ____       
 *	|  _ \ ___  __| | __ _ / ___| ___  
 *	| |_) / _ \/ _` |/ _` | |  _ / _ \ 
 *	|  __/  __/ (_| | (_| | |_| | (_) |
 *	|_|   \___|\__,_|\__,_|\____|\___/
 *								
 *								PHP Framework
 * -------------------------------------------------------
 *
 * Copyright (C) 2018  Drajat Hasan (drajathasan20@gmail.com)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *							
 * -------------------------------------------------------
 */

/* Directory */
/**
 *  Separator
 */
 define('SP', DIRECTORY_SEPARATOR);

/**
 *  Base Path
 */
 define('BASE_PATH', realpath(__DIR__));
 define('BP', BASE_PATH.SP);

/**
 */
 define('CORE', BP.'core'.SP);

/**
 */
 define('HELPER', BP.'helper'.SP);

/* Mode */
$normal_mode  = array('prod');
$testing_mode = array('maintenance', 'enchance');
$system_conf['mode'] = 'enchance'; // prod, maintenance, & enchance

/* Error Set */
// took from and modified from Ci
// set error result
if (in_array($system_conf['mode'], $testing_mode)) {
	error_reporting(-1);
	ini_set('display_errors', 1);
} else if (in_array($system_conf['mode'], $normal_mode)) {
	ini_set('display_errors', 0);
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
} else {
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Ada yang salah dari pengaturannya :(';
	exit(1);
}

/* Template */
$system_conf['template']['public'] = 'default';
// require dynamic template
//require CORE.'config/template.gen.inc.php';

/* Base uRL */
$system_conf['base_url'] = '';

/* Call base url from Router */
if (file_exists(CORE.'router.inc.php')) {
	//require CORE.'router.inc.php';
}

/* Call template */
if ($system_conf['mode'] === 'maintenance') {
	require CORE.'view/maintenance/index_template.inc.php';
} else {
   require CORE.'view/'.$system_conf['template']['public'].'/index_template.inc.php';
}