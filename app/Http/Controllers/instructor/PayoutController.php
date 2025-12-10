<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Payout;
use App\Models\Payment_gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayoutController extends Controller
{
    public function index()
{
    // Fechas por defecto: primer y último día del mes
    $start_date = strtotime('first day of this month');
    $end_date   = strtotime('last day of this month');

    // Guardamos los valores iniciales para la vista
    $page_data['start_date'] = $start_date;
    $page_data['end_date']   = $end_date;

    // Si el usuario envía rango de fechas
    if (request()->has(['sDateRange', 'eDateRange'])) {

        $sDate = urldecode(request()->query('sDateRange')); 
        $eDate = urldecode(request()->query('eDateRange'));

        $start_date = strtotime($sDate . ' 00:00:00');
        $end_date   = strtotime($eDate . ' 23:59:59');

        // Se actualiza también para la vista
        $page_data['start_date'] = $start_date;
        $page_data['end_date']   = $end_date;
    }

    // Consulta principal de reportes
    $query = Payout::where('user_id', auth()->user()->id)
        ->where('created_at', '>=', date('Y-m-d H:i:s', $start_date))
        ->where('created_at', '<=', date('Y-m-d H:i:s', $end_date))
        ->latest('id');

    $page_data['payout_reports'] = $query
        ->paginate(10)
        ->appends(request()->query()); // guarda el rango en la paginación

    $page_data['payout_request'] = Payout::where('user_id', auth()->user()->id)
        ->where('status', 0)
        ->first();

    $page_data['total_payout'] = instructor_total_payout();
    $page_data['balance']      = instructor_available_balance();

    // 🔥 NUEVO: cargar datos del usuario y pasarlos a la vista
    $page_data['user_data']        = auth()->user();
    $page_data['user_keys']        = json_decode($page_data['user_data']->paymentkeys, true);
    $page_data['payment_gateways'] = Payment_gateway::where('status', '!=', 1)->get();

    return view('instructor.payout_report.index', $page_data);
}


    public function store(Request $request)
    {
        // check old request
        if (Payout::where('user_id', auth()->user()->id)->where('status', 0)->exists()) {
            Session::flash('error', get_phrase('Your request is in process.'));
            return redirect()->back();
        }

        // check amount validity
        $total_income      = instructor_total_revenue();
        $total_payout      = instructor_total_payout();
        $balance_remaining = $total_income - $total_payout;

        if ($request->amount < 1 || $request->amount > $balance_remaining) {
            Session::flash('error', get_phrase('You do not have sufficient balance.'));
            return redirect()->back();
        }

        $data['user_id'] = auth()->user()->id;
        $data['amount']  = $request->amount;
        Payout::insert($data);

        Session::flash('success', get_phrase('Your request has been submitted.'));
        return redirect()->back();
    }

    public function delete($id)
    {
        if (Payout::where('id', $id)->where('user_id', auth()->user()->id)->doesntExist()) {
            Session::flash('error', get_phrase('Data not found.'));
            return redirect()->back();
        }
        Payout::where('id', $id)->delete();
        Session::flash('success', get_phrase('Your request has been deleted.'));
        return redirect()->back();
    }
}
