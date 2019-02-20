<?php

/**
 * Registers an action.
 *
 * @param string $action The name of the action
 * @param string $filename The filename where this action is located.
 *
 * @return void
 */
function develop_register_action($action, $file) {
    global $Develop;
    $Develop->action[$action] = $file;
}

/**
 * Unregister action
 *
 * @param string $action The name of the action
 *
 * @return void
 */
function develop_unregister_action($action) {
    global $Develop;
    unset($Develop->action[$action]);
}