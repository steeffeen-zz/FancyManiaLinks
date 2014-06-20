<?php

namespace FML\ManiaCode;

/**
 * ManiaCode Element for joining a server
 *
 * @author    steeffeen <mail@steeffeen.com>
 * @copyright FancyManiaLinks Copyright © 2014 Steffen Schröder
 * @license   http://www.gnu.org/licenses/ GNU General Public License, Version 3
 */
class JoinServer implements Element {
	/*
	 * Protected properties
	 */
	protected $tagName = 'join_server';
	protected $login = null;
	protected $ip = null;
	protected $port = null;

	/**
	 * Create a new JoinServer object
	 *
	 * @param string $login (optional) Server login
	 * @return \FML\ManiaCode\JoinServer|static
	 */
	public static function create($login = null) {
		return new static($login);
	}

	/**
	 * Construct a new JoinServer object
	 *
	 * @param string $login (optional) Server login
	 */
	public function __construct($login = null) {
		if (!is_null($login)) {
			$this->setLogin($login);
		}
	}

	/**
	 * Set the server login
	 *
	 * @param string $login Server login
	 * @return \FML\ManiaCode\JoinServer|static
	 */
	public function setLogin($login) {
		$this->login = (string)$login;
		$this->ip    = null;
		$this->port  = null;
		return $this;
	}

	/**
	 * Set the server ip and port
	 *
	 * @param string $ip   Server ip
	 * @param int    $port Server port
	 * @return \FML\ManiaCode\JoinServer|static
	 */
	public function setIp($ip, $port) {
		$this->ip    = (string)$ip;
		$this->port  = (int)$port;
		$this->login = null;
		return $this;
	}

	/**
	 * @see \FML\ManiaCode\Element::render()
	 */
	public function render(\DOMDocument $domDocument) {
		$xmlElement = $domDocument->createElement($this->tagName);
		if (is_null($this->ip)) {
			$loginElement = $domDocument->createElement('login', $this->login);
			$xmlElement->appendChild($loginElement);
		} else {
			$ipElement = $domDocument->createElement('ip', $this->ip . ':' . $this->port);
			$xmlElement->appendChild($ipElement);
		}
		return $xmlElement;
	}
}
