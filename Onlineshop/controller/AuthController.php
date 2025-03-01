<?php
require_once 'model/AuthModel.php';

class AuthController {
    private array $errors = [];

    public function register($request){
        $fname = $request['fname'];
        $lname = $request['lname'];
        $phone = $request['phone'];
        $email = $request['email'];
        $password = $request['password'];

        if (empty($fname)) {
            $this->errors[] = "First name is required";
        }
        if (empty($lname)) {
            $this->errors[] = "Last name is required";
        }
        if (empty($phone)) {
            $this->errors[] = "Phone is required";
        }
        if (empty($email)) {
            $this->errors[] = "Email is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Invalid email";
        }
        if (empty($password)) {
            $this->errors[] = "Password is required";
        } else if (strlen($password) < 6){
            $this->errors[] = "Password must be at least 6 characters";
        }

        if (empty($this->errors)) {
            $AuthModel = new AuthModel();
            $AuthModel->register($fname, $lname, $email, $phone, $password);
            return true;
        } else {
            return $this->errors;
        }
    }

    public function login($request){
        $email = $request['email'];
        $password = $request['password'];

        if (empty($email)) {
            $this->errors[] = "Email is required";
        }

        if (empty($password)) {
            $this->errors[] = "Password is required";
        }

        if (empty($this->errors)) {
            $authModel = new AuthModel();
            $user = $authModel->getUserByEmail($email);
            if ($user) {

                if ($user['active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        unset($user['password']);
                        $_SESSION['user'] = $user;
                        return true;
                    } else {
                        $this->errors[] = "Invalid password";
                        return $this->errors;
                    }
                }else {
                    $this->errors[] = "please activate your account";
                    return $this->errors;  
                }
            } else {
                $this->errors[] = "Email not found";
                return $this->errors;
            }
        } else {
            return $this->errors;
        }
    }

    public function logout(){
        $_SESSION = [];
        session_destroy();
        header('Location: login.php');
        exit;
    }
}