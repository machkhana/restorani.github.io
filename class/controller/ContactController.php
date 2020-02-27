<?php
class Contact{
    public function address($l){
        if($l=='ge'){
            $address = "<strong>ქინძმარაულის #15</strong>
                    <p>საქართველო, თბილისი</p>";
        }else if($l=='en'){
            $address = "<strong>Kindzmarauli str. #15</strong>
                    <p>Tbilisi, Georgia</p>";
        }
        return $address;
    }
    public function email($l){
        if($l=='ge'){
            $email = "<strong>ელ-ფოსტა</strong>
                 <p><a href='' mailto>info@bora.com.ge</a></p>";
        }elseif ($l=='en'){
            $email = "<strong>E-mail</strong>
                 <p><a href='' mailto>info@bora.com.ge</a></p>";
        }
        return $email;
    }
    public function phone($l){
        if($l=='ge'){
            $phone = "<strong>დაგვიკავშირდით</strong>
                 <p>+995599999999999</p>";
        }elseif ($l=='en'){
            $phone = "<strong>Call</strong>
                 <p>+995599999999999</p>";
        }
        return $phone;
    }
}
$contact = new Contact();
