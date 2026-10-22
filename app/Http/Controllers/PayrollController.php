<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function calculate(Request $request)
    {
        $employmentType = $request->employmentType;
        $positionTier = $request->positionTier;
        $daysAbsent = $request->daysAbsent;
        $minutesLate = $request->minutesLate;
        $overtimeHours = $request->overtimeHours;

        // Determine monthly salary and deductions
        if ($employmentType == "COS") {

            $monthlyBaseSalary = 18000;
            $sss = 0;
            $philHealth = 0;
            $pagIbig = 0;

        } elseif ($employmentType == "Regular" && $positionTier == "Junior") {

            $monthlyBaseSalary = 25000;
            $sss = 1125;
            $philHealth = 625;
            $pagIbig = 200;

        } elseif ($employmentType == "Regular" && $positionTier == "Senior") {

            $monthlyBaseSalary = 40000;
            $sss = 1800;
            $philHealth = 1000;
            $pagIbig = 200;

        } else {

            return response()->json([
                "message" => "Invalid employment type or position tier."
            ], 400);
        }

        // Payroll formulas
        $daysPresent = 22 - $daysAbsent;

        $dailyRate = $monthlyBaseSalary / 22;

        $hourlyRate = $dailyRate / 8;

        $lateDeduction = ($hourlyRate / 60) * $minutesLate;

        $absentDeduction = $dailyRate * $daysAbsent;

        $overtimePay = $overtimeHours * ($hourlyRate * 1.25);

        $grossPay = $monthlyBaseSalary
            - $lateDeduction
            - $absentDeduction
            + $overtimePay;

        $totalDeductions = $sss + $philHealth + $pagIbig;

        $netPay = $grossPay - $totalDeductions;

        return response()->json([
            "employmentType" => $employmentType,
            "positionTier" => $positionTier,
            "daysPresent" => $daysPresent,
            "dailyRate" => round($dailyRate, 2),
            "hourlyRate" => round($hourlyRate, 2),
            "lateDeduction" => round($lateDeduction, 2),
            "absentDeduction" => round($absentDeduction, 2),
            "overtimePay" => round($overtimePay, 2),
            "grossPay" => round($grossPay, 2),
            "sss" => round($sss, 2),
            "philHealth" => round($philHealth, 2),
            "pagIbig" => round($pagIbig, 2),
            "totalDeductions" => round($totalDeductions, 2),
            "netPay" => round($netPay, 2)
        ]);
    }
}