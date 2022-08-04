<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class InscritosCategorias
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Categorias')
            ->addData('si', [
                \App\Models\users_inscription::where('atencion_infantil','si')->count(),
                \App\Models\users_inscription::where('deteccion_temprana_enfermedades_cardiovasculares', 'si')->count(),
                \App\Models\users_inscription::where('programas_atencion_obesidad', 'si')->count(),
                \App\Models\users_inscription::where('programas_atencion_diabetes', 'si')->count(),
                \App\Models\users_inscription::where('programas_atencion_hta', 'si')->count(),
                \App\Models\users_inscription::where('procesos_atencion_deteccion_temprana_cancer', 'si')->count(),
                \App\Models\users_inscription::where('enfoque_diferencial_procesos_atencion', 'si')->count(),
            ])
            ->addData('No', [
                \App\Models\users_inscription::where('atencion_infantil','no')->count(),
                \App\Models\users_inscription::where('deteccion_temprana_enfermedades_cardiovasculares', 'no')->count(),
                \App\Models\users_inscription::where('programas_atencion_obesidad', 'no')->count(),
                \App\Models\users_inscription::where('programas_atencion_diabetes', 'no')->count(),
                \App\Models\users_inscription::where('programas_atencion_hta', 'no')->count(),
                \App\Models\users_inscription::where('procesos_atencion_deteccion_temprana_cancer', 'no')->count(),
                \App\Models\users_inscription::where('enfoque_diferencial_procesos_atencion', 'no')->count(),
            ])
            ->setXAxis(['Atencion en Salud Materno Perinatal', 'Deteccion enfermedades cardiovasculares', 'Programas atencion obesidad',
             'Programas atencion diabetes', 'Programas atencion HTA', 'Deteccion temprana cancer','Enfoque diferencial procesos atencion']);
    }
}
