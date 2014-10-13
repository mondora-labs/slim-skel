<?php
class MyAutoloader {
	public static function loader($class) {
		$completePath='/Users/matteo/work/workspace/h3g/slim-skel/'. str_replace ( '\\', '/', $class ) . '.php';
		if (file_exists ( $completePath )) { // classe PHP di progetto
			require_once ($completePath);
		}
	}
}

spl_autoload_register ( 'MyAutoloader::loader' );

?>