<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class InscritosFasesCategorias
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\HeatMapChart
    {
        return $this->chart->heatMapChart()
            ->setTitle('Basic radar chart')
            ->addHeat('Resultado', [
                \App\Models\Result::avg('porcentaje_resultado_perinatal'),
                \App\Models\Result::avg('porcentaje_resultado_cardio'),
                \App\Models\Result::avg('porcentaje_resultado_cancer'),             
                \App\Models\Result::avg('porcentaje_resultado_enfoque'),
            ])
            ->addHeat('Proceso', [
                \App\Models\Result::avg('porcentaje_proceso_perinatal'),
                \App\Models\Result::avg('porcentaje_proceso_cardio'),
                \App\Models\Result::avg('porcentaje_proceso_cancer'),             
                \App\Models\Result::avg('porcentaje_proceso_enfoque'),
            ])
            
            ->addHeat('Estructura', [
                \App\Models\Result::avg('porcentaje_estructura_perinatal'),
                \App\Models\Result::avg('porcentaje_estructura_cardio'),
                \App\Models\Result::avg('porcentaje_estructura_cardio'),             
                \App\Models\Result::avg('porcentaje_estructura_cardio'),
            ])
            
            ->setMarkers(['#FFA41B', '#4F46E5'], 7, 10)
            ->setXAxis(['Materno perinatal', 'Cardio', 'Cancer', 'Enfoque diferencial']);
    }
}
