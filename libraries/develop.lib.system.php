<?php

/**
 * Call a hook
 *
 * @param string $hook The name of the hook
 * @param string $type The type of the hook
 * @param mixed $params Additional parameters to pass to the handlers
 * @param mixed $returnvalue An initial return value
 *
 * @return mix data
 */
function develop_call_hook($hook, $type, $params = null, $returnvalue = null) {
	global $Develop;
	$hooks = array();
	if (isset($Develop->hooks[$hook][$type])) {
		$hooks[] = $Develop->hooks[$hook][$type];
	}
	foreach ($hooks as $callback_list) {
		if (is_array($callback_list)) {
			foreach ($callback_list as $hookcallback) {
				if (is_callable($hookcallback)) {
					$args              = array(
						$hook,
						$type,
						$returnvalue,
						$params
					);
					$temp_return_value = call_user_func_array($hookcallback, $args);
					if (!is_null($temp_return_value)) {
						$returnvalue = $temp_return_value;
					}
				}
			}
		}
	}
	
	return $returnvalue;
}


/**
 * Trigger a callback
 *
 * @param string $event Callback event name
 * @param string $type The type of the callback
 * @param mixed $params Additional parameters to pass to the handlers
 *
 * @return bool
 */
function develop_trigger_callback($event, $type, $params = null) {
	global $Develop;
	$events = array();
	if (isset($Develop->events[$event][$type])) {
		$events[] = $Develop->events[$event][$type];
	}
	foreach ($events as $callback_list) {
		if (is_array($callback_list)) {
			foreach ($callback_list as $eventcallback) {
				$args = array(
					$event,
					$type,
					$params
				);
				if (is_callable($eventcallback) && (call_user_func_array($eventcallback, $args) === false)) {
					return false;
				}
			}
		}
	}
	
	return true;
}