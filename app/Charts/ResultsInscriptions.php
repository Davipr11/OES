<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
class ResultsInscriptions
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\RadarChart
    {
        return $this->chart->radarChart()
            ->setTitle('Promedio de resultados')
            ->addData('Porcentaje promedio',[
                \App\Models\Result::avg('porcentaje_perinatal'),
                \App\Models\Result::avg('porcentaje_cancer'),
                \App\Models\Result::avg('porcentaje_cardio'),             
                \App\Models\Result::avg('porcentaje_enfoque'),
                
            ])
            ->setXAxis(['Salud materno perinatal', 'Deteccion de cancer', 'Deteccion de enfermedades cardiovasculares','Enfoque del prestador'])
            ->setMarkers(['#303F9F'], 7, 10);
    }
}
