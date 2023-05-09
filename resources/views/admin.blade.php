<!doctype html>
<html lang="fr">
<head>
    @include('Include/header')
    <title>NamekCBD - Admin</title>

    <!-- CSS HOME -->
    <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
</head>
<body>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    @if(session()->has('success'))
                        <br>
                        <div class="alert alert-success" style="width: 60%;margin-left:20%">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-5">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 mb-30">
                    <div class="card" id="card-principale">
                        <div class="card-body">
                          <h4 class="card-title">Vente total</h4>
                          <p class="card-text" style="color:red;" id="card-principale-text">458 CHF</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card" id="card-principale">
                        <div class="card-body">
                          <h4 class="card-title">Commande total</h4>
                          <p class="card-text" id="card-principale-text">18</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card" id="card-principale">
                        <div class="card-body">
                          <h4 class="card-title">Meilleur produit</h4>
                          <p class="card-text" id="card-principale-text">Lemon Haze</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-30">
                    <div class="card" id="card-principale">
                        <div class="card-body">
                          <h4 class="card-title">Avis positif</h4>
                          <p class="card-text" id="card-principale-text">56</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>

        <div class="row" id="admin-resume">
            <div class="col">
                <h3 style="color:#499b4a;">Dashboard</h3><br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <h4 class="mb-4">Nouveaux utilisateurs</h4>
                                <a href="#">
                                    <h6 class="voir-plus">VOIR PLUS</h6>
                                </a>
                                <div class="row">
                                    <table id="table-new-user">
                                        <thead>
                                            <tr class="table-hr">
                                                <th>Name</th>
                                                <th>email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-hr">
                                                <td>Angelo Rogeiro</td>
                                                <td>angelo.rogeiro@eduvaud.ch</td>
                                            </tr>
                                            <tr class="table-hr">
                                                <td>Maxime Rossi</td>
                                                <td>maximer2001@gmail.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <h4 class="mb-4">Nouveaux produits</h4>
                                <a href="#">
                                    <h6 class="voir-plus">VOIR PLUS</h6>
                                </a>
                                <div class="row">
                                    <table id="table-order">
                                        <thead>
                                            <tr class="table-hr">
                                                <th>Nom</th>
                                                <th>Date</th>
                                                <th>Prix</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-hr">
                                                <td>Lemon Haze</td>
                                                <td>25.04.2023</td>
                                                <td>20 CHF</td>
                                            </tr>
                                            <tr class="table-hr">
                                                <td>Bonbon - Banane</td>
                                                <td>22.04.2023</td>
                                                <td>12.50 CHF</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <h4 class="mb-4">Gérer les avis</h4>
                                <a href="#">
                                    <h6 class="voir-plus">VOIR PLUS</h6>
                                </a>
                                <div class="row">
                                    <table id="table-order">
                                        <thead>
                                            <tr class="table-hr">
                                                <th>Nom</th>
                                                <th>Commentaire</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-hr">
                                                <td>Gabriel Rossi</td>
                                                <td>Magnifique produit</td>
                                                <td>En attente</td>
                                            </tr>
                                            <tr class="table-hr">
                                                <td>Angelo Rogeiro</td>
                                                <td>Fumez-tue !</td>
                                                <td>Supprimé</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <h4 class="mb-4">Commandes en cours</h4>
                                <a href="#">
                                    <h6 class="voir-plus">VOIR PLUS</h6>
                                </a>
                                <div class="row">
                                    <table id="table-order">
                                        <thead>
                                            <tr class="table-hr">
                                                <th>Number</th>
                                                <th>Date d'achat</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-hr">
                                                <td>000001</td>
                                                <td>24.04.2023</td>
                                                <td>En cours</td>
                                            </tr>
                                            <tr class="table-hr">
                                                <td>000002</td>
                                                <td>24.04.2023</td>
                                                <td>Envoyé</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="#flush-collapseOne">
                                Ajouter un produit
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <form action="{{ route('add_product') }}" method="POST">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td>
                                                <label for="product-name"> <b>Nom</b></label><br>
                                                <input type="text" placeholder="Lemon Haze" name="product-name" id="input" required>
                                            </td>
                                            <td>
                                                <label for="product-description"> <b>Description</b></label><br>
                                                <input type="text" placeholder="Description du produit" name="product-description" id="input" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="product-image"><b>Image</b></label><br>
                                                <input type="file" placeholder="Image du produit" name="product-image" id="input" accept="image/*" required>
                                            </td>
                                            <td>
                                                <label for="product-size"><b>Poids [gr]</b></label><br>
                                                <input type="number" placeholder="Taille du produit" name="product-size" id="input" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="product-thc"><b>Taux [THC]</b></label><br>
                                                <input type="number" min="0" max="1" placeholder="1" name="product-thc" id="input" required>
                                            </td>
                                            <td>
                                                <label for="product-cbd"><b>Taux [CBD]</b></label><br>
                                                <input type="number" min="0" placeholder="26" name="product-cbd" id="input" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="product-culture"><b>Culture</b></label><br>
                                                <input type="text" placeholder="intérieur" name="product-culture" id="input" required>
                                            </td>
                                            <td>
                                                <label for="product-price-ht"><b>Prix [HT]</b></label><br>
                                                <input type="number" placeholder="12,45" step="0.01" min="0" name="product-price-ht" id="input" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label for="product-stock"><b>En stock</b></label><br>
                                                <input type="number" min="0" placeholder="7" name="product-stock" id="input" required>
                                            </td>
                                            <td>
                                                <label for="product-categrory"><b>Category</b></label><br>
                                                <select name="product-categrory" id="input" required>
                                                    <option value="1">Plantes CBD</option>
                                                    <option value="2">Huiles CBD</option>
                                                    <option value="3">Bonbons CBD</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                @error('product-name')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-description')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-image')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-size')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-thc')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-cbd')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-culture')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-price-ht')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-stock')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                                @error('product-categrory')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><button class="cta-btn" type="submit">Envoyer</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('Include/footer')
</body>
</html>
