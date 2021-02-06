<?php

class Exam extends Database
{
    public function afficherDatesParMatiere($matiereID, $type)
    {
        $this->query('  SELECT
                            a.annee,
                            a.id as id_annee,
                            e.session,
                            m.id as id_matiere
                        FROM
                            t8v_annees a,
                            t8v_matieres m,
                            t8v_examens e 
                        WHERE
                            e.id_annee = a.id
                        AND
                            e.id_matiere = m.id
                        AND
                            e.type = :type
                        AND
                            m.id = :id');

        $this->bind(':id', $matiereID);
        $this->bind(':type', $type);

        if ($dates = $this->resultSet())
            return $dates;

        return [];
    }

    public function afficherParties($matiereID, $session, $annee, $type)
    {
        $this->query('  SELECT DISTINCT
                            q.partie
                        FROM
                            t8v_questions q,
                            t8v_annees a,
                            t8v_examens e,
                            t8v_matieres m
                        WHERE
                            m.id = e.id_matiere
                        AND
                            q.id_examen = e.id
                        AND
                            e.id_annee = a.id
                        AND
                            m.id = :matiereID
                        AND
                            e.session = :session
                        AND
                            a.id = :annee
                        AND
                            e.type = :type');

        $this->bind(':matiereID', $matiereID);
        $this->bind(':session', $session);
        $this->bind(':annee', $annee);
        $this->bind(':type', $type);

        return $this->resultSet();
    }

    public function afficherQuestions($matiereID, $session, $annee, $type)
    {
        $this->query('  SELECT
                            q.*,
                            a.annee
                        FROM
                            t8v_questions q,
                            t8v_annees a,
                            t8v_examens e,
                            t8v_matieres m
                        WHERE
                            m.id = e.id_matiere
                        AND
                            q.id_examen = e.id
                        AND
                            e.id_annee = a.id
                        AND
                            m.id = :matiereID
                        AND
                            e.session = :session
                        AND
                            a.id = :annee
                        AND
                            e.type = :type');

        $this->bind(':matiereID', $matiereID);
        $this->bind(':session', $session);
        $this->bind(':annee', $annee);
        $this->bind(':type', $type);

        return $this->resultSet();
    }
}
