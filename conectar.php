<?php
        require_once './BD/DataBase.php';
        $conn = DataBase::getInstance()->getDb();

        echo "conectado com sucesso";
        ?>