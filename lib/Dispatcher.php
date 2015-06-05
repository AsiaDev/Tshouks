<?php
class Dispatcher {
	public static function dispatch() {
		$url = $_SERVER ['REQUEST_URI'];
		$GLOBALS ['uri'] = $url;
		
		$GLOBALS ['limit'] = 20;
		$GLOBALS ['offset'] = 0;
		
		if (strpos ( $url, '?' )) {
			$url = strstr ( $_SERVER ['REQUEST_URI'], '?', true );
			$GLOBALS ['uri'] = $url;
			
			try {
				if (isset ( $_GET ['limit'] )) {
					$GLOBALS ['limit'] = ( int ) $_GET ['limit'];
				}
			} catch ( Exception $e ) {
			}
			
			try {
				if (isset ( $_GET ['offset'] )) {
					$GLOBALS ['offset'] = ( int ) $_GET ['offset'];
				}
			} catch ( Exception $e ) {
			}
		}
		$url = explode ( '/', trim ( $url, '/' ) );
		
		$controllerName = ! empty ( $url [0] ) ? ucfirst ( $url [0] ) . 'Controller' : 'DefaultController';
		$method = ! empty ( $url [1] ) ? $url [1] : 'index';
		$args = array_slice ( $url, 2 );
		
		require_once ("controller/$controllerName.php");
		$controller = new $controllerName ();
		
		// decode url
		for($i = 0; $i < count ( $args ); $i ++) {
			$args [$i] = rawurldecode ( $args [$i] );
		}
		
		call_user_func_array ( array (
				$controller,
				$method 
		), $args );
		
		unset ( $controller );
	}
}
