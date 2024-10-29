<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function report()
    {
        $totalPurchases = Purchase::where('type', 'purchase')->sum('amount');
        $purchaseReturns = Purchase::where('type', 'purchase_return')->sum('amount');
        $currentStock = Transaction::where('type', 'open_stock')->sum('quantity')
                        + Transaction::where('type', 'purchase')->sum('quantity')
                        - Transaction::where('type', 'sell')->sum('quantity');

        $purchaseTrendsData = Purchase::selectRaw('DATE(created_at) as date, SUM(amount) as total')
                                ->groupBy('date')
                                ->get()
                                ->map(function ($item) {
                                    return [
                                        'date' => $item->date,
                                        'total' => $item->total
                                    ];
                                });
        $purchaseHistory = Purchase::with('product')
                            ->get(['product_id', 'type', 'quantity', 'amount', 'created_at'])
                            ->map(function ($purchase) {
                                return [
                                    'product_name' => $purchase->product->name,
                                    'type' => $purchase->type,
                                    'quantity' => $purchase->quantity,
                                    'amount' => $purchase->amount
                                ];
                            });
        $products = Product::all();                    

        return view('purchase-report', compact('totalPurchases', 'purchaseReturns', 'currentStock', 'purchaseTrendsData', 'purchaseHistory', 'products'));
    }
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id', 
            'quantity' => 'required|integer|min:1', 
            'amount' => 'required|numeric|min:0', 
            'type' => 'required|in:purchase,purchase_return', 
        ]);

        $purchase = Purchase::create([
            'product_id' => $validatedData['product_id'],
            'quantity' => $validatedData['quantity'],
            'amount' => $validatedData['amount'],
            'type' => $validatedData['type'],
        ]);

        
        return redirect()->route('purchase.report') 
        ->with('success', 'Purchase recorded successfully.');
    }
}