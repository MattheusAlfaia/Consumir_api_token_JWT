<?php

class TokenClass{

    public function CriarToken($user, $pass){

        $url = "http://localhost:8000/auth";
        $data = array("username" => $user, "password" => $pass);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);
        $token = $response['token'];

        return $token;

    }

    public function BuscarUser($token, $user, $id){

        $url = "http://localhost:8000/users";
        $data = array("token" => $token, "id" => $id, "username" => $user);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response, true);
        // var_dump($response); exit;

        if(isset($response['message'])){
            return false;
        }else{
            return $response;
        }



        return  $response;

    }
}

?>