<?php
class ConversorMoeda {
    private float $valorReais;
    private string $moedaDestino;
    private float $cotacao;

    public function __construct($valorReais, $moedaDestino, $cotacao) {
        $this->valorReais = $valorReais;
        $this->moedaDestino = $moedaDestino;
        $this->cotacao = $cotacao;
    }

    public function converter() {
        return $this->valorReais / $this->cotacao;
    }

    public function getSimbolo() {
        switch ($this->moedaDestino) {
            case 'USD':
                return '$';
            case 'EUR':
                return '€';
            default:
                return '';
        }
    }

    public function exibirResultado() {
        $convertido = $this->converter();
        $simbolo = $this->getSimbolo();

        return "
        <ul>
            <li><strong>Valor em Reais:</strong> R$ " . number_format($this->valorReais, 2, ',', '.') . "</li>
            <li><strong>Moeda destino:</strong> {$this->moedaDestino}</li>
            <li><strong>Cotação:</strong> R$ " . number_format($this->cotacao, 2, ',', '.') . "</li>
            <li><strong>Valor convertido:</strong> {$simbolo} " . number_format($convertido, 2, '.', ',') . "</li>
        </ul>
        ";
    }
}
?>