<?php 

namespace Core;

class Request {

    public function verifyReq() {
        $req = $_REQUEST;

        foreach($req as $value) {
            htmlspecialchars($value);
            trim($value);
            stripslashes($value);
        }
        return $req;
    }
}