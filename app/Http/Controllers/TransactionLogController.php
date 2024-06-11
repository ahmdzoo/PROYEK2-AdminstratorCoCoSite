<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionLog;

class TransactionLogController extends Controller
{
    public function index()
    {
        $transactionLogs = TransactionLog::all();
        return view('transaction_logs.index', compact('transactionLogs'));
    }

    public function edit($id)
    {
        $log = TransactionLog::find($id);
        return view('transaction_logs.edit', compact('log'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:transaction_logs,id',
            'customer_name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'bill' => 'required|numeric',
            'whatsapp_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'order_status' => 'required|string|max:255',
            'action' => 'required|string|max:255',
        ]);

        $log = TransactionLog::findOrFail($request->id);
        $log->update([
            'customer_name' => $request->customer_name,
            'service' => $request->service,
            'product' => $request->product,
            'bill' => $request->bill,
            'whatsapp_number' => $request->whatsapp_number,
            'address' => $request->address,
            'order_status' => $request->order_status,
            'action' => $request->action,
        ]);

        return redirect()->route('transaction_logs.index')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'product' => 'required|string|max:255',
            'bill' => 'required|numeric',
            'whatsapp_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'order_status' => 'required|string|max:255',
            'action' => 'required|string|max:255',
        ]);

        $log = new TransactionLog([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'service' => $request->service,
            'product' => $request->product,
            'bill' => $request->bill,
            'whatsapp_number' => $request->whatsapp_number,
            'address' => $request->address,
            'order_status' => $request->order_status,
            'action' => $request->action,
        ]);

        $log->save();
        return redirect()->back()->with('success', 'Transaction log saved successfully.');
    }

    public function destroy($id)
    {
        $log = TransactionLog::find($id);
        $log->delete();
        return redirect()->route('transaction_logs.index')->with('success', 'Transaksi berhasil dihapus');
    }
}