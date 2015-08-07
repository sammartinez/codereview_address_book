<?php
      class Contact
      {
        private $contactName;
        private $contactPhone;
        private $homeAddress;

        //Constructor
          function __construct($contactName, $contactPhone, $homeAddress)
          {
            $this->name = $contactName;
            $this->number = $contactPhone;
            $this->address = $homeAddress;
          }

          //Setters
          function setContactName($new_contact_name)
          {
            $this->name = (string) $new_contact_name;
          }

          function setPhone($new_contact_phone)
          {
            $this->number = (float) $new_contact_phone;
          }

          function setHomeAddress($new_home_address)
          {
            $this->address = (string) $new_home_address;
          }

          //Getters
          function getContactName()
          {
            return $this->name;
          }

          function getContactPhone()
          {
            return $this->number;
          }

          function getHomeAddress()
          {
            return $this->address;
          }

          //Save Methods
          function save()
          {
            array_push($_SESSION['list_of_contacts'], $this);
          }

          //Static Methods
          static function getAll()
          {
            return $_SESSION['list_of_contacts'];
          }

          static function deleteAll()
          {
            return $_SESSION['list_of_contacts'] = array();
          }
      }

 ?>
