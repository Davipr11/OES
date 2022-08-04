<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class InscritosTerritorio
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Caracter territorial')
            ->addData('Inscritos', [
                \App\Models\users_inscription::where('caracter_territorial','Nacional')->count(),
                \App\Models\users_inscription::where('caracter_territorial', 'Distrital')->count(),
                \App\Models\users_inscription::where('caracter_territorial', 'Departamental')->count(),
                \App\Models\users_inscription::where('caracter_territorial', 'Municipal')->count(),
                \App\Models\users_inscription::where('caracter_territorial', 'Indigena')->count(),
            ])
            ->setXAxis(['Nacional', 'Distrital', 'Departamental', 'Municipal', 'Indigena'])
            ->setColors(['#0466E2']);
    }
}
