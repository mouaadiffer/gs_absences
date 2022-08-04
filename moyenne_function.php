<?php 
function moyenne($conn,$note,$nbrAbsence){
	$moyenne=$note-$nbrAbsence*0.25;
	return $moyenne;
}


?>