<?php
		function Userexists()
		{
		        $stmt = $db_conn ->prepare("SELECT KundenNr FROM kunden WHERE KundenNr = :KD");
        $stmt->bindParam(':KD', $_POST['KundenNr']); //->bind_param(1, $_POST['KundenNr']);
        $stmt->execute();
        $result = $stmt->fetchAll();
			return $result;
        
    }


		
?>