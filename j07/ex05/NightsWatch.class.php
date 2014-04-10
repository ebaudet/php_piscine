<?php

class NightsWatch {
	function fight() {return ;}
	function recruit($who) {
		if ($who instanceof IFighter)
			$who->fight();
	}
}

?>