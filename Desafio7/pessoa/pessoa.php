<?php
class Pessoa {
    private string $nome;
    private float $peso;
    private float $altura;

    public function __construct($nome, $peso, $altura) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC() {
        return $this->peso / ($this->altura * $this->altura);
    }

    public function classificarIMC() {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "Abaixo do peso ⚠️";
        } elseif ($imc < 25) {
            return "Peso normal ✅";
        } elseif ($imc < 30) {
            return "Sobrepeso ⚠️";
        } else {
            return "Obesidade ❌";
        }
    }

    public function exibirResultado() {
        $imc = $this->calcularIMC();
        $classificacao = $this->classificarIMC();

        return "
        <ul>
            <li><strong>Nome:</strong> {$this->nome}</li>
            <li><strong>Peso:</strong> {$this->peso} kg</li>
            <li><strong>Altura:</strong> {$this->altura} m</li>
            <li><strong>IMC:</strong> " . number_format($imc, 2, ',', '.') . "</li>
            <li><strong>Classificação:</strong> {$classificacao}</li>
        </ul>
        ";
    }
}
?>