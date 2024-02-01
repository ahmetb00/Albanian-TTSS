<?php

class TTS
{
    private $id;
    private $user_id;
    private $language;
    private $text;

    function __construct($id, $user_id, $language, $text)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->language = $language;
        $this->text = $text;
    }
    
    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getText()
    {
        return $this->text;
    }
}
?>