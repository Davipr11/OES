<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class InscritosFases
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('Promedio de resultados Fases de evaluacion')
            ->addData([
                \App\Models\Result::avg('PorcentajeEstructura'),
                \App\Models\Result::avg('PorcentajeProceso'),
                \App\Models\Result::avg('PorcentajeResultado')
            ])
            ->setLabels(['Estructura', 'Proceso', 'Resultado']);
    }
}
