<?php
class Password {
  private $password;

  public function __construct($password) {
    $this->password = $password;
  }

  public function generate($length = 8, $complexity = 'strong') {
    $chars = '';
    switch ($complexity) {
      case 'strong':
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+-=';
        break;
      case 'medium':
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        break;
      case 'weak':
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        break;
    }
    $this->password = substr(str_shuffle($chars), 0, $length);
    return $this->password;
  }

  public function check($password2) {
    return $this->password === $password2;
  }

  public function getPassword() {
    return $this->password;
  }
}

class PasswordTest {
  public function testGenerate() {
    $password = new Password('');
    $generatedPassword = $password->generate();
    echo 'Generated Password: ' . $generatedPassword . "\n";
  }

  public function testCheck() {
    $password1 = new Password('password123');
    $password2 = new Password('password123');
    echo 'Passwords Match: ' . ($password1->check($password2->getPassword()) ? 'True' : 'False') . "\n";
  }
}

$passwordTest = new PasswordTest();
$passwordTest->testGenerate();
$passwordTest->testCheck();
?>