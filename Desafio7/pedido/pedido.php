<?php
class Pedido {
    private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente;

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = $tipoCliente;
    }

    public function calcularTotalBruto() {
        return $this->quantidade * $this->precoUnitario;
    }

    public function calcularDesconto() {
        if ($this->tipoCliente === 'premium') {
            return $this->calcularTotalBruto() * 0.10; // 10% desconto
        }
        return 0;
    }

    public function calcularImposto() {
        return $this->calcularTotalBruto() * 0.08; // 8% imposto
    }

    public function calcularTotalFinal() {
        return $this->calcularTotalBruto() 
             - $this->calcularDesconto() 
             + $this->calcularImposto();
    }

    public function exibirResumo() {
        return "
        <ul>
            <li><strong>Produto:</strong> {$this->produto}</li>
            <li><strong>Quantidade:</strong> {$this->quantidade}</li>
            <li><strong>Preço Unitário:</strong> R$ " . number_format($this->precoUnitario, 2, ',', '.') . "</li>
            <li><strong>Total Bruto:</strong> R$ " . number_format($this->calcularTotalBruto(), 2, ',', '.') . "</li>
            <li><strong>Desconto:</strong> R$ " . number_format($this->calcularDesconto(), 2, ',', '.') . "</li>
            <li><strong>Imposto (8%):</strong> R$ " . number_format($this->calcularImposto(), 2, ',', '.') . "</li>
            <li><strong>Total Final:</strong> R$ " . number_format($this->calcularTotalFinal(), 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>