<?php
namespace GameBundle\Entity;

class Task
{
    
    // protected $dueDate;
    public $Message;

    public function getMessage()
    {
        return $this->Message;
    }

    public function setMessage($Message)
    {
        $this->Message = $Message;
    }

    // public function getDueDate()
    // {
    //     return $this->dueDate;
    // }

    // public function setDueDate(\DateTime $dueDate = null)
    // {
    //     $this->dueDate = $dueDate;
    // }
    
}
?>