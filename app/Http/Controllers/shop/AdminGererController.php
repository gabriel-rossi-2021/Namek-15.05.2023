<?php

namespace App\Http\Controllers\shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Opinions;

class AdminGererController extends Controller
{
    // VUE GererAdmin
    public function index(){
        // ALL USER
        $userGerer = User::all();

        // ALL PRODUCTS
        $productGerer = Product::all();

        // ALL COMMENT
        $commentGerer = Opinions::all();

        // ALL COMMANDE
        $orderGerer = Order::all();


        return view('adminGerer', compact('userGerer', 'productGerer', 'commentGerer', 'orderGerer'));
    }

    // SUPRESSION D'UN UTILISATEUR
    public function removeUser($id){
        $user = User::find($id);
        $user->delete();
        $user->address()->delete(); // SUPPRIMER L'ADRESSE ASSOCIEE
        return redirect()->route('adminGerer');
    }

    // SUPRESSION D'UN PRODUIT
    public function removeProduit($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('adminGerer');
    }


    /*

    // SUPRESSION D'UN COMMENTAIRE
    public function removeComment($id){
        $comment = Opinions::find($id);
        $comment->delete();
        return redirect()->route('adminGerer');
    }


    // SUPRESSION D'UNE COMMANDE
    public function removeOrder($id){
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('adminGerer');
    }

    */
}
