<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

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

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('facture.facture', $data);
        return $pdf->stream('facture.pdf');
    }

}
