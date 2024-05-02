<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;

class OrdersController extends Controller
{
    public function allorders(Request $request)
    {
        if ($request->session()->has('adminname')) {
            $orders = Checkout::with('user', 'product')->get();
            if ($request->order_status) {
                $orders = Checkout::with('user', 'product')->where('status', $request->order_status)->get();
                $paginate = false;
            } else {
                $orders = Checkout::with('user', 'product')->paginate(5);
                $paginate = true;

            }

            if ($request->select) {
                $orders = Checkout::with('user', 'product')->paginate($request->select
            );
                // return $orders;
                $paginate = true;
            }

            if ($request->start_date && $request->end_date) {
                $orders = Checkout::with('user', 'product')->whereBetween('created_at', [$request->start_date, $request->end_date])->get();
                $paginate = true;
            }

            if ($request->search) {

                $orders = Checkout::where('status', 'like', '%' . $request->search . '%')
                    ->orWhere('price', 'like', '%' . $request->search . '%')
                    ->orWhereHas('user', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->search . '%')
                            ->orWhere('email', 'like', '%' . $request->search . '%');
                    })
                    ->orWhereHas('product', function ($query) use ($request) {
                        $query->where('name', 'like', '%' . $request->search . '%')
                            ->orWhere('price', 'like', '%' . $request->search . '%');
                    })
                    ->with('user', 'product')
                    ->get();




                $paginate = false;


                // return $orders;
            }
            return view('admin_orders.allorders', compact('orders', 'paginate'));
        } else {

            return view('admin.dashboard')->with('success', 'Login first.');
        }
    }
    public function pendingorders(Request $request, $id = null)
    {
        if ($request->session()->has('adminname')) {
            if ($id) {
                $checkoutorder = Checkout::with('user')->find($id);

                $checkoutorder->status = 2;
                $checkoutorder->save();
                $mailData = [
                    'title' => 'Mail from ZeMozone.com',
                    'body' => 'Your Product is Shipped. Pending for delivery.',
                ];
                Mail::to($checkoutorder->user->email)->send(new DemoMail($mailData));
                return back()->with('success', 'Order confirmed successfully.');
            } else {

                $orders = Checkout::with('user', 'product')->where('status', 2)->get();
            }

            return view('admin_orders.pendingorders', compact('orders'));
        } else {

            return view('admin.dashboard')->with('success', 'Login first.');
        }
    }
    public function rejectorders(Request $request, $id = null)
    {
        if ($request->session()->has('adminname')) {
            if ($id) {
                $checkoutorder = Checkout::with('user')->find($id);
                $checkoutorder->status = 3;
                $checkoutorder->save();
                $mailData = [
                    'title' => 'Mail from ZeMozone.com',
                    'body' => 'Your Product is cancelled.',
                ];
                Mail::to($checkoutorder->user->email)->send(new DemoMail($mailData));
                return back()->with('success', 'Order rejected successfully.');
            } else {

                $orders = Checkout::with('user', 'product')->where('status', 3)->get();
            }

            return view('admin_orders.rejectorders', compact('orders'));
        } else {

            return view('admin.dashboard')->with('success', 'Login first.');
        }
    }
    public function acceptorder(Request $request, $id = null)
    {
        if ($request->session()->has('adminname')) {
            if ($id) {
                $checkoutorder = Checkout::with('user')->find($id);
                $checkoutorder->status = 4;
                $checkoutorder->save();

                $mailData = [
                    'title' => 'Mail from ZeMozone.com',
                    'body' => 'Your Product is deliverd.',
                ];
                Mail::to($checkoutorder->user->email)->send(new DemoMail($mailData));
                return back()->with('success', 'Order Compleated successfully.');
            } else {

                $orders = Checkout::with('user', 'product')->where('status', 4)->get();
            }

            return view('admin_orders.rejectorders', compact('orders'));
        } else {

            return view('admin.dashboard')->with('success', 'Login first.');
        }
    }

}
