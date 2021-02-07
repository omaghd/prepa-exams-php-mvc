<?php

class Feedback extends Database
{
    public function ajouterFeedback($nom, $email, $feedback)
    {
        $this->query('  INSERT INTO t8v_feedbacks
                            (`nom`, `email`, `feedback`, `ip`, `user_agent`)
                        VALUES 
                            (:nom, :email, :feedback, :ip, :user_agent)');

        $this->bind(':nom', $nom);
        $this->bind(':email', $email);
        $this->bind(':feedback', $feedback);
        $this->bind(':ip', $_SERVER['SERVER_ADDR']);
        $this->bind(':user_agent', $_SERVER['HTTP_USER_AGENT']);

        return $this->execute();
    }
}
