<?php 
   $name  = $_POST['name'];
   Fetchuserdata($name);

   function Fetchuserdata($steamid){
    $xml = simplexml_load_file("http://steamcommunity.com/id/$steamid/?xml=1");
    if(!empty($xml)) {
        $username = $xml->steamID;
        $id64bit = $xml->steamID64;
        $avatar = $xml->avatarFull;
        
        //convert id64 to guid
           $steamID = $id64bit;
           $temp = '';
           
           for ($i = 0; $i < 8; $i++) {
               $temp .= chr($steamID & 0xFF);
               $steamID >>= 8;
           }
           $id_encode = md5('BE' . $temp);
        
           //ajax data return
           $return_array = [(string)$avatar, (string)$username, $id_encode];

           echo json_encode($return_array);
       }
    };
