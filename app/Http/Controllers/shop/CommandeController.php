<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    // Afficher le design de la facture
    public function AfficheFacture(Request $request){
        $user = $request->user();
        $content = Cart::getContent();
        $price_ht = array();

        foreach ($content as $item) {
            $price_ht[] = number_format($item->getPriceSum() / (1 + 0.077), 3, '.', '');
        }

        $total_ttc_panier = Cart::getTotal();
        $tva = $total_ttc_panier / (1 + 0.077) * 0.077;
        $total_ht_panier = $total_ttc_panier - $tva;

        // Stocker les ID des produits dans un tableau
        $product_ids = array();
        foreach($content as $item){
            $product_ids[] = $item->get('id');
        }

        $data = [
            'user' => $user,
            'content' => $content,
            'price_ht' => $price_ht,
            'tva' => $tva,
            'total_ttc_panier' => $total_ttc_panier,
            'total_ht_panier' => $total_ht_panier
        ];

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('facture.facture', $data);

        // AJOUTER INFORMATION DANS ORDER
        $order = new Order();
        $order->order_number = rand(100000, 999999);
        $order->status = 'En attente';
        $order->date_purchase = Carbon::now();
        $order->user_id = $user->id_users;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->save();

        $orderId = Order::query()->orderBy('id_order', 'desc')->take(1)->get();

        foreach($orderId as $orderids){
            $order_id = $orderids->id_order;
        }

        // Insérer les produits de la commande dans la table order_product
        foreach($content as $item) {
            DB::table('order_product')->insert([
                'order_id' => $orderids->id_order,
                'product_id' => $item->get('id'),
                'quantity' => $item->quantity,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $pdf->stream('facture.pdf');

        foreach ($product_ids as $product_id) {
            $order->products()->attach($product_id);
        }
    }
}
