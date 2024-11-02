<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceOrderMailable;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{

    public function index(Request $request){
        $todayDate = Carbon::now()->format('Y-m-d');

        $orders = Order::when($request->date != null ,function($query_date) use ($request){
            return $query_date->whereDate('created_at',$request->date);
        },function($query_date) use ($todayDate){
            $query_date ->whereDate('created_at',$todayDate);
        })
        ->when($request->status != null ,function($query_status) use ($request){
            return $query_status->where('status_message',$request->status);
        })
        ->paginate(12);

       return view('admin.order.index',[
        'orders' =>$orders
       ]);
    }

    public function show(Order $order){
        if($order){
            return view('admin.order.show',['order'=>$order]);
        }
        return redirect('orders.index');
    }

    public function edit(Order $order){
        return view('admin.order.edit',['order'=>$order]);
    }

    public function update(Request $request, Order $order){
        if($order){
            $order->update([
                'status_message' =>$request->status_message,
            ]);
            return to_route('orders.index')->with('success','Status Update Successfully !');
        }
    }

    public function viewInvoive($orderId){
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice',['order'=>$order]);
    }

    public function generateInvoive($orderId){
        $order = Order::findOrFail($orderId);
        $data = ['order'=>$order];
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        $todayDate = Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice'.$order->id.'-'.$todayDate.'.pdf');
    }

    public function sendMailInvoice($orderId)
    {
        $order = Order::findOrFail($orderId);
        try {
            Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
            return redirect('admin/orders/'.$orderId)->with('message','Invoice mail has been sent to '.$order->email);
        } catch (\Exception $e) {
            return redirect('admin/orders/'.$orderId)->with('message','Something went wrong !');
        }
    }
}
