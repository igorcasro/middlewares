<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produtos = ["Televisão 40", "Notebook LeNovo", "Impressora HP", "HD Externo"];

    public function __construct()
    {
        $this->middleware(\App\Http\Middleware\ProdutoAdmin::class);
    }

    public function index()
    {
        echo "<h3>Produtos</h3>";
        echo "<ol>";
        foreach ($this->produtos as $produto)
            echo "<li>" . $produto . "</li>";
        echo "</ol>";
    }
}
