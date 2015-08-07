<?php
      class Contact
      {
        private $contactName;
        private $phoneNumber;
        private $homeAddress;

        //Constructor
          function __construct($contactName, $phoneNumber, $homeAddress)
          {
            $this->name = $contactName;
            $this->number = $phoneNumber;
            $this->address = $homeAddress;
          }

          //Setters
          function setContactName($new_contact_name)
          {
            $this->name = (string) $new_contact_name;
          }

          function setPhoneNumber($new_phone_number)
          {
            $this->number = (float) $new_phone_number;
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

          function getPhoneNumber()
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
