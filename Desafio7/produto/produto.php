<?php
class Produto {
    private string $nome;
    private int $estoque;
    private float $valor;

    public function __construct($nome, $estoque, $valor) {
        $this->nome = $nome;
        $this->estoque = $estoque;
        $this->valor = $valor;
    }

    public function adicionarEstoque(int $quantidade) {
        $this->estoque += $quantidade;
    }

    public function removerEstoque(int $quantidade) {
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
        } else {
            return "❌ Estoque insuficiente!";
        }
    }

    public function calcularValorTotal() {
        return $this->estoque * $this->valor;
    }

    public function exibirDados() {
        return "
        <ul>
            <li><strong>Produto:</strong> {$this->nome}</li>
            <li><strong>Estoque atual:</strong> {$this->estoque}</li>
            <li><strong>Valor unitário:</strong> R$ " . number_format($this->valor, 2, ',', '.') . "</li>
            <li><strong>Valor total em estoque:</strong> R$ " . number_format($this->calcularValorTotal(), 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>