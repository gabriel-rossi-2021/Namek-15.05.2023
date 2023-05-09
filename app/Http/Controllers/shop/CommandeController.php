<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Cart;
use Carbon\Carbon;

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

        $data = [
            'user' => $user,
            'content' => $content,
            'price_ht' => $price_ht,
            'tva' => $tva,
            'total_ttc_panier' => $total_ttc_panier,
            'total_ht_panier' => $total_ht_panier
        ];

        // AJOUTER INFORMATION DANS ORDER
        $order = new Order();
        $order->order_number = rand(100000, 999999);
        $order->status = 'en attente';
        $order->date_purchase = Carbon::now();
        $order->user_id = $user->id_users;
        // DATE ET HEURE ACTUEL
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $order->product_id = $item;


        foreach($content as $item){
            $product = Product::findOrFail($item->id_product);
            $order->products()->attach($product, ['quantity' => $item->quantity]);

            // NOUVELLE ENTREE DANS LA TABLE DE LIAISON ORDERPRODUCT
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id_order;
            $orderProduct->product_id = $product->id_product;
            $orderProduct->quantity = $item->quantity;
            $orderProduct->save();
        }

        $order->save();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('facture.facture', $data);
        return $pdf->stream('facture.pdf');
    }

}
