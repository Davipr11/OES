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

        $results=DB::table('results')
            ->join('users_inscriptions','results.User','=','users_inscriptions.Codigorandom')
            ->join('users','users_inscriptions.Evaluador','=','users.id')
            ->select('results.porcentaje_perinatal', 'results.porcentaje_cardio', 'results.porcentaje_cancer', 'results.porcentaje_enfoque')
            ->where('users_inscriptions.Evaluador', auth()->user()->id)
            ->orderbyDesc('results.PorcentajeTotal')->get();

        return $this->chart->radarChart()
            ->setTitle('Resultados')
            ->addData('Stats', [8,9,5,20])
            ->setXAxis(['Salud materno perinatal', 'Deteccion de cancer', 'Deteccion de enfermedades cardiovasculares', 'Enfoque del prestador'])
            ->setMarkers(['#303F9F'], 7, 10);
    }
}
