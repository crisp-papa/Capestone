<?php

class ItemDB extends DB{
   
    public function getItemData()//$itemID
    {
        //intval($itemID);
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select * from item'); //where itemID = :itemIDValue
            //$stmt->bindParam(':itemIDValue', $itemID, PDO::PARAM_INT);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        }  
    }
    
    public function getWeaponItemData()
    {
        //intval($itemID);
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select * from item where itemType = "Weapon"');
            //$stmt->bindParam(':itemIDValue', $itemID, PDO::PARAM_INT);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        }  
    }
    
    public function getArmorItemData()
    {
        //intval($itemID);
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select * from item where itemType = "Armor"');
            //$stmt->bindParam(':itemIDValue', $itemID, PDO::PARAM_INT);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
        }  
    }
    
    public function getInventoryItemData($itemID)//
    {
        intval($itemID);
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select * from item where itemID = :itemIDValue'); //
            $stmt->bindParam(':itemIDValue', $itemID, PDO::PARAM_INT);
            try {
                if ( $stmt->execute() ) // if everything was excecuted corectly
                {
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $data;
                }
            } catch (PDOException | Exception $e) { 
                return false;
            }
        }  
    }
}
