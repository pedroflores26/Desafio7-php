<?php
class ReservaHotel {
    private string $nome;
    private int $noites;
    private string $tipoQuarto;

    public function __construct($nome, $noites, $tipoQuarto) {
        $this->nome = $nome;
        $this->noites = $noites;
        $this->tipoQuarto = $tipoQuarto;
    }

    public function getPrecoDiaria() {
        switch ($this->tipoQuarto) {
            case 'simples':
                return 120;
            case 'luxo':
                return 200;
            case 'suite':
                return 350;
            default:
                return 0;
        }
    }

    public function calcularTotal() {
        return $this->noites * $this->getPrecoDiaria();
    }

    public function calcularDesconto() {
        if ($this->noites > 5) {
            return $this->calcularTotal() * 0.10; // 10% desconto
        }
        return 0;
    }

    public function calcularTotalFinal() {
        return $this->calcularTotal() - $this->calcularDesconto();
    }

    public function exibirResumo() {
        return "
        <ul>
            <li><strong>Hóspede:</strong> {$this->nome}</li>
            <li><strong>Tipo de quarto:</strong> {$this->tipoQuarto}</li>
            <li><strong>Noites:</strong> {$this->noites}</li>
            <li><strong>Valor da diária:</strong> R$ " . number_format($this->getPrecoDiaria(), 2, ',', '.') . "</li>
            <li><strong>Total:</strong> R$ " . number_format($this->calcularTotal(), 2, ',', '.') . "</li>
            <li><strong>Desconto:</strong> R$ " . number_format($this->calcularDesconto(), 2, ',', '.') . "</li>
            <li><strong>Total final:</strong> R$ " . number_format($this->calcularTotalFinal(), 2, ',', '.') . "</li>
            <li><strong>Mensagem:</strong> Bem-vindo(a), {$this->nome}! Aproveite sua estadia 😊</li>
        </ul>
        ";
    }
}
?>