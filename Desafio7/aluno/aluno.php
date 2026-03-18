<?php
class Aluno {
    private string $nome;
    private string $disciplina;
    private float $nota1;
    private float $nota2;
    private float $nota3;

    public function __construct($nome, $disciplina, $nota1, $nota2, $nota3) {
        $this->nome = $nome;
        $this->disciplina = $disciplina;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
        $this->nota3 = $nota3;
    }

    public function calcularMedia() {
        return ($this->nota1 + $this->nota2 + $this->nota3) / 3;
    }

    public function verificarStatus() {
        $media = $this->calcularMedia();

        if ($media >= 7) {
            return "Aprovado ✅";
        } elseif ($media >= 5) {
            return "Recuperação ⚠️";
        } else {
            return "Reprovado ❌";
        }
    }

    public function exibirResultado() {
        $media = $this->calcularMedia();
        $status = $this->verificarStatus();

        return "
        <ul>
            <li><strong>Aluno:</strong> {$this->nome}</li>
            <li><strong>Disciplina:</strong> {$this->disciplina}</li>
            <li>Nota 1: {$this->nota1}</li>
            <li>Nota 2: {$this->nota2}</li>
            <li>Nota 3: {$this->nota3}</li>
            <li><strong>Média:</strong> " . number_format($media, 2, ',', '.') . "</li>
            <li><strong>Status:</strong> {$status}</li>
        </ul>
        ";
    }
}
?>