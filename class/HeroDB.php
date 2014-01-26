<?php

class HeroDB extends DB{
    
    public function getHeroData($userID){
        
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select * from Hero where userID = :userIDValue');
            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_STR);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                return $data;
            }
        }  
    }
    
    // i had done these 2 functions indevidualy because i know in the future i am just going to want username and not user ID
    public function getUsername( $userID ){
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select userID, userName from Users where userID = :userIDValue');
            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_STR);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $return = $data['userName'];
                return $return;
            }
        }
        //return false;
    }
    
    public function getUserID(){
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('select userID, email from Users where email = :emailValue');
            $stmt->bindParam(':emailValue', $_POST["email"], PDO::PARAM_STR);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                $data = $stmt->fetch(PDO::FETCH_ASSOC);
                $return = $data['userID'];
                return $return;
            }
        }
        //return false;
    }
    
    public function defaultEntry() {
        
        echo "Made it to default Entry<br/>";
        
        $userID = $this->getUserID(); // get the user ID from the users table
        $username = $this->getUsername( $userID ); //gets the username based on user ID
        
        $dbh = $this->getDB();
        if ( null != $dbh ) {
            
            echo "Made it to default Entry before prepare <br/>";
                       
            $stmt = $dbh->prepare("insert into Hero set userID = :userIDValue, userName = :usernameValue");
            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT);
            $stmt->bindParam(':usernameValue', $username, PDO::PARAM_STR);
            
            echo "Made it to default Entry after binding<br/>";
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                
                echo "Made it to default Entry after execute <br/>";
                
                return true;
            }
            
            echo "you are now after execute without the return true <br/>";
            
        }
        return false; 
    }
    
    public function saveHero($userID, $armorClass, $attackBonus, $currentHP, $damage, $description, $imagePath, $maxHP, $pass, $userName, $x, $y) {
        
        intval($userID);
        $db = $this->getDB();
        if ( null != $db ) {
            $stmt = $db->prepare('update Hero '
                    . 'set '
                    . 'armorClass = :armorClassValue, '
                    . 'attackBonus = :attackBonusValue, '
                    . 'currentHP = :currentHPValue, '
                    . 'damage = :damageValue, '
                    . 'description = :descriptionValue, '
                    . 'imagePath = :imagePathValue '
                    . 'maxHP = :maxHPValue '
                    . 'pass = :passValue '
                    . 'userName = :userNameValue '
                    . 'x = :xValue '
                    . 'y = :yValue '
                    . 'where userID = :userIDValue;');
            $stmt->bindParam(':userIDValue', $userID, PDO::PARAM_INT);
            $stmt->bindParam(':armorClassValue', $armorClass, PDO::PARAM_INT);
            $stmt->bindParam(':attackBonusValue', $attackBonus, PDO::PARAM_INT);
            $stmt->bindParam(':currentHPValue', $currentHP, PDO::PARAM_INT);
            $stmt->bindParam(':damageValue', $damage, PDO::PARAM_INT);
            $stmt->bindParam(':descriptionValue', $description, PDO::PARAM_STR);
            $stmt->bindParam(':imagePathValue', $imagePath, PDO::PARAM_STR);
            $stmt->bindParam(':maxHPValue', $maxHP, PDO::PARAM_INT);
            $stmt->bindParam(':passValue', $pass, PDO::PARAM_INT);
            $stmt->bindParam(':userNameValue', $userName, PDO::PARAM_STR);
            $stmt->bindParam(':xValue', $x, PDO::PARAM_INT);
            $stmt->bindParam(':yValue', $y, PDO::PARAM_INT);
            
            if ( $stmt->execute() ) // if everything was excecuted corectly
            {
                return true;
            }
        }
        return false; 
    }
    
    
}