<?php
class Pessoa {
    private $id;
    private $nome;
    private $email;

    public function __construct($nome, $email, $id = null) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
    }

    // Getters e Setters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
?>
