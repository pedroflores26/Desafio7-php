<?php
class CalculadoraFinanceira {
    private float $valor;
    private int $parcelas;
    private float $juros; // em %

    public function __construct($valor, $parcelas, $juros) {
        $this->valor = $valor;
        $this->parcelas = $parcelas;
        $this->juros = $juros / 100; // converte para decimal
    }

    public function calcularTotal() {
        return $this->valor * pow((1 + $this->juros), $this->parcelas);
    }

    public function calcularParcela() {
        return $this->calcularTotal() / $this->parcelas;
    }

    public function calcularJurosTotal() {
        return $this->calcularTotal() - $this->valor;
    }

    public function exibirResultado() {
        return "
        <ul>
            <li><strong>Valor inicial:</strong> R$ " . number_format($this->valor, 2, ',', '.') . "</li>
            <li><strong>Parcelas:</strong> {$this->parcelas}x</li>
            <li><strong>Taxa de juros:</strong> " . ($this->juros * 100) . "% ao mês</li>
            <li><strong>Valor total:</strong> R$ " . number_format($this->calcularTotal(), 2, ',', '.') . "</li>
            <li><strong>Valor da parcela:</strong> R$ " . number_format($this->calcularParcela(), 2, ',', '.') . "</li>
            <li><strong>Juros pagos:</strong> R$ " . number_format($this->calcularJurosTotal(), 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>