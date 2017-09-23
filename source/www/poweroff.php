<?php
/**
 * Calls poweroff for clean shutdown
 *
 * @author     P. Henelle for Cubitux
 * @license    BSD License (https://github.com/phenelle/RPi_Photoboth/blob/master/LICENSE)
 * @version    1.0
 */

shell_exec("sudo /sbin/poweroff");
