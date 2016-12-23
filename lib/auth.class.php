<?php
	class Auth
	{
		public static function set($name, $logged)
		{
			$_SESSION['logged'] = $logged;
			$_SESSION['name'] = $name;
		}

		public static function destroy()
		{
			unset($_SESSION['logged']);
			unset($_SESSION['name']);
		}

		public static function get()
		{
			return $_SESSION['name'];
		}

		public static function isLogged()
		{
			return ( isset($_SESSION['logged']) ? true : false );
		}

		public static function check($userData)
		{
			$item = (new User)->firstBy('login', $userData['login']);
			if ( $item['pass'] === md5($userData['pass']) ) {
				static::set($item['login'], true);
				return true;
			} else {
				return false;
			}

		}



	}
