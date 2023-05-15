<!doctype html>
<html lang="fr">
<head>
    @include('Include/header')
    <title>NamekCBD - Admin</title>

    <!-- CSS HOME -->
    <link rel="stylesheet" href="{{ asset('css/style-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-adminGerer.css') }}">
</head>
<body>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @error('current_password')
                        <div class="alert alert-danger">
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="/">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="admin">Tableau de bord</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gérer</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3 show-form" id="show-form-gerer-user">
                                    <p class="mb-0">Gérer les utilisateurs</p>
                                    <i class="fa-solid fa-user"></i>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3 show-form"  id="show-form-gerer-produit">
                                    <p class="mb-0">Gérer les produits</p>
                                    <i class="fa-solid fa-stop"></i>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3 show-form" id="show-form-gerer-comment">
                                    <p class="mb-0">Gérer les commentaires</p>
                                    <i class="fa-solid fa-comment"></i>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3 show-form" id="show-form-gerer-commande">
                                    <p class="mb-0">Gérer les commandes</p>
                                    <i class="fa-solid fa-shopping-cart"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="my-form-gerer-user" style="display: flex">
                        <table>
                            <thead>
                                <tr class="table-hr">
                                    <th>Nom</th>
                                    <th>email</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!-- FORMULAIRE DE GESTION DES UTILISATEURS -->
                            @foreach ($userGerer as $formGererUser)
                                <form class="my-form" method="POST" action="{{ route('remove_user', ['id' => $formGererUser->id_users]) }}">
                                @csrf
                                @method('DELETE')
                                    <tbody>
                                        <tr class="table-hr">
                                            <td>{{ $formGererUser->last_name }} {{ Str::limit($formGererUser->first_name, 1, '.') }}</td>
                                            <td>{{ $formGererUser->email }}</td>
                                            <td><span class="badge badge-warning" style="background: rgb(211, 211, 29)"><i class="fa-solid fa-edit"></i></span></td>
                                            <td>
                                                <button type="submit" class="badge badge-warning" style="background: red">
                                                    <i class="fa-solid fa-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </form>
                            @endforeach
                        </table>
                    </div>

                    <div id="my-form-gerer-produit" style="display: none">
                        <table>
                            <thead>
                                <tr class="table-hr">
                                    <th>Nom</th>
                                    <th>Prix HT</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!-- FORMULAIRE DE GESTION DES PRODUITS -->
                            @foreach ($productGerer as $formGererProduit)
                                <form class="my-form" method="POST" action="{{ route('remove_produit', ['id' => $formGererProduit->id_product]) }}">
                                @csrf
                                @method('DELETE')
                                    <tbody>
                                        <tr class="table-hr">
                                            <td>{{ $formGererProduit->name_product }}</td>
                                            <td>{{ number_format($formGererProduit->price_ht,2) }}</td>
                                            <td><span class="badge badge-warning" style="background: rgb(211, 211, 29)"><i class="fa-solid fa-edit"></i></span></td>
                                            <td>
                                                <button type="submit" class="badge badge-warning" style="background: red">
                                                   <i class="fa-solid fa-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </form>
                            @endforeach
                        </table>
                    </div>

                    <div id="my-form-gerer-comment" style="display: none">
                        <table>
                            <thead>
                                <tr class="table-hr">
                                    <th>Utilisateur</th>
                                    <th>Produit</th>
                                    <th>Avis</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!-- FORMULAIRE DE GESTION DES COMMENTAIRES -->
                            @foreach ($commentGerer as $formGererCommentaire)
                                <form class="my-form" method="POST" action="{{ route('remove_comment', ['id' => $formGererCommentaire->id_opinion]) }}">
                                @csrf
                                @method('DELETE')
                                    <tbody>
                                        <tr class="table-hr">
                                            <td>{{ $formGererCommentaire->user->username }}</td>
                                            <td>{{ $formGererCommentaire->product->name_product }}</td>
                                            <td>{{ implode(' ', array_slice(explode(' ', $formGererCommentaire->comment ), 0,3)) }}... </td>
                                            <td><span class="badge badge-warning" style="background: rgb(211, 211, 29)"><i class="fa-solid fa-edit"></i></span></td>
                                            <td>
                                                <button type="submit" class="badge badge-warning" style="background: red">
                                                    <i class="fa-solid fa-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </form>
                            @endforeach
                        </table>
                    </div>

                    <div id="my-form-gerer-commande" style="display: none">
                        <table>
                            <thead>
                                <tr class="table-hr">
                                    <th>N° commande</th>
                                    <th>Status</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!-- FORMULAIRE DE GESTION DES COMMANDES -->
                            @foreach ($orderGerer as $formGererCommande)
                                <form class="my-form" method="POST" action="{{ route('remove_order', ['id' => $formGererCommande->id_order]) }}">
                                @csrf
                                @method('DELETE')
                                    <tbody>
                                        <tr class="table-hr">
                                            <td>{{ $formGererCommande->order_number }}</td>
                                            <td>{{ $formGererCommande->status }}</td>
                                            <td><span class="badge badge-warning" style="background: rgb(211, 211, 29)"><i class="fa-solid fa-edit"></i></span></td>
                                            <td>
                                                <button type="submit" class="badge badge-warning" style="background: red">
                                                    <i class="fa-solid fa-remove"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </form>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Récupération des éléments du DOM
        const showFormBtnInfo = document.querySelector('#show-form-gerer-user');
        const formInfo = document.querySelector('#my-form-gerer-user');

        const showFormBtnMdp = document.querySelector('#show-form-gerer-produit');
        const formMdp = document.querySelector('#my-form-gerer-produit');

        const showFormBtnAdresse = document.querySelector('#show-form-gerer-comment');
        const formAdresse = document.querySelector('#my-form-gerer-comment');

        const showFormBtnAddAdresse = document.querySelector('#show-form-gerer-commande');
        const formAddAddress = document.querySelector('#my-form-gerer-commande');

        // Ajout de l'événement de clic sur le bouton d'information
        showFormBtnInfo.addEventListener('click', () => {
            formInfo.style.display = 'flex';
            // masquer les autres formulaires
            formMdp.style.display = 'none';
            formAdresse.style.display = 'none';
            formAddAddress.style.display = 'none';
        });

        // Ajout de l'événement de clic sur le bouton de changement de mot de passe
        showFormBtnMdp.addEventListener('click', () => {
            formMdp.style.display = 'flex';
            // masquer les autres formulaires
            formInfo.style.display = 'none';
            formAdresse.style.display = 'none';
            formAddAddress.style.display = 'none';
        });

        // Ajout de l'événement de clic sur le bouton de changement d'adresse
        showFormBtnAdresse.addEventListener('click', () => {
            formAdresse.style.display = 'flex';
            // masquer les autres formulaires
            formInfo.style.display = 'none';
            formMdp.style.display = 'none';
            formAddAddress.style.display = 'none';

        });

        // Ajout de l'événement de clic sur le bouton d'Ajouter une adresse
        showFormBtnAddAdresse.addEventListener('click', () => {
            formAddAddress.style.display = 'flex';
            // masquer les autres formulaires
            formInfo.style.display = 'none';
            formMdp.style.display = 'none';
            formAdresse.style.display = 'none';
        });
    </script>
    @include('Include/footer')
</body>
</html>
