<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        if (isset($_GET['range'])) {
            $range = $_GET['range'];
        };
        if (isset($_GET['to'])) {
            $to = $_GET['to'];
        }
        if (isset($_GET['from'])) {
            $from = $_GET['from'];
        }

        $report = null;
        $reportData = new Report();

        if ($range) {
            if ($range == 'daily') {
                $report = $reportData->getReport('daily', null, null);
            } elseif ($range == 'weekly') {
                $report = $reportData->getReport('weekly', null, null);
            } elseif ($range == 'monthly') {
                $report = $reportData->getReport('monthly', null, null);
            } elseif ($range == 'yearly') {
                $report = $reportData->getReport('yearly', null, null);
            } elseif ($range == 'custom') {
                $report = $reportData->getReport('custom', $to, $from);
            }
        }

        return view('reports.index', compact('report'));
    }
}
