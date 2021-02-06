<?php

class Matiere extends Database
{
    public function afficherMatieres()
    {
        $this->query('SELECT * FROM t8v_matieres ORDER BY id DESC');
        return $this->resultSet();
    }
}
