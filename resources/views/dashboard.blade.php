<!doctype html>
<html lang="fr">
<head>
    @include('Include/header')
    <title>NamekCBD - Mon compte</title>

    <!-- CSS HOME -->
    <link rel="stylesheet" href="{{ asset('css/style-dashboard.css') }}">
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
                        <li class="breadcrumb-item active" aria-current="page">Mon compte</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        @if($user->title == "Monsieur")
                            <img src="{{ asset('img/Dashboard/avatarMen.webp') }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        @else
                            <img src="{{ asset('img/Dashboard/avatarWomen.jpg') }}"  alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        @endif

                        <h5 class="my-3">{{ $user->first_name }} {{ $user->last_name }}</h5>
                        <div class="d-flex justify-content-center mb-2">
                            <a href="/panier">
                                <button type="button" class="btn" style="background: #499b4a;color: white">Mon panier</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3 show-form" id="show-form-change-info">
                                <p class="mb-0">Modifier informations générales</p>
                                <i class="fa-solid fa-user-pen"></i>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3 show-form"  id="show-form-change-mdp">
                                <p class="mb-0">Changer mot de passe</p>
                                <i class="fa-solid fa-lock"></i>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3 show-form" id="show-form-change-adresse">
                                <p class="mb-0">Changer adresse</p>
                                <i class="fa-solid fa-location-dot"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <form id="my-form-info" class="my-form" method="POST" action="{{ route('dashboard.update', $user->id_users) }}">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <label for="input-text">Email : </label><br>
                                <input type="email" id="input-text" name="email" value="{{ old('email', $user->email) }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="input-text">Mobile : </label><br>
                                <input type="phone" id="input-text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="input-text">Username : </label><br>
                                <input type="text" id="input-text" name="username" value="{{ old('username', $user->username) }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @error('email')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                                @error('phone_number')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                                @error('username')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="cta-btn">Modifier</button></td>
                        </tr>
                    </table>
                </form>
                <form id="my-form-mdp" class="my-form"  method="POST" action="{{ route('dashboard.update.mdp', $user->id_users) }}">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <label for="current_password">Ancien mot de passe :</label><br>
                                <input type="password" name="current_password" id="current_password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password">Nouveau mot de passe :</label><br>
                                <span style="color:red;">Min 8 caractère</span><br>
                                <input type="password" name="password" id="password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password_confirmation">Confirmer mot de passe :</label><br>
                                <input type="password" name="password_confirmation" id="password_confirmation">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @error('password')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="cta-btn">Modifier</button></td>
                        </tr>
                    </table>
                </form>
                <form id="my-form-adresse" class="my-form" method="POST" action="{{ route('dashboard.update.address', $user->id_users) }}">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <label for="rue">Rue :</label><br>
                                <input type="text" name="rue" id="rue" value="{{ old('ville', $user->address->street) }}">
                            </td>

                            <td>
                                <label for="NdeRue">N° de rue :</label><br>
                                <input type="number" name="NdeRue" id="NdeRue" value="{{ old('NdeRue', $user->address->street_number) }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="ville">Ville :</label><br>
                                <input type="text" name="ville" id="ville" value="{{ old('ville', $user->address->city) }}">
                            </td>
                            <td>
                                <label for="npa">NPA :</label><br>
                                <input type="number" name="npa" id="npa" value="{{ old('npa', $user->address->NPA) }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                @error('rue')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                                @error('NdeRue')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                                @error('ville')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                                @error('npa')
                                    <div class="alert alert-danger">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td><button type="submit" class="cta-btn">Modifier</button></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="mb-4">Informations générales</h4>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Titre</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->title }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Prénom / Nom</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->first_name }} {{ $user->last_name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nom d'utilisateur</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ $user->username }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                                @if($user->address->country == "Suisse")
                                    <p class="text-muted mb-0">+41 {{ $formatted_number }}</p>
                                @else
                                    <p class="text-muted mb-0">{{ $user->phone_number }}</p>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Date de naissance</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ date_format(date_create($user->birth_date), 'd.m.Y') }}</p> <!--- date_format permet de mettre la date en Suisse -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <h4 class="mb-4">Informations complémentaires</h4>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Rue</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->address->street }}, {{ $user->address->street_number }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">NPA / Ville</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->address->NPA }} {{ $user->address->city }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Pays</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->address->country }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <h4 class="mb-4">Historique de commande</h4>
                            </div>
                            <table id="cart" class="table table-hover table-condensed">
                                <thead>
                                <tr>
                                    <th>N° commande</th>
                                    <th style="text-align: center">Satuts</th>
                                    <th style="text-align: center">Date d'achat</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $o )
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div>
                                                    <span>{{ $o->order_number }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                @if($o->status == "En attente")
                                                    <span class="badge badge-warning" style="background: rgb(211, 211, 29)">{{ $o->status }}</span>
                                                @elseif($o->status == "En cours")
                                                    <span class="badge badge-info" style="background: blue">{{ $o->status }}</span>
                                                @elseif($o->status == "Terminé")
                                                    <span class="badge badge-info" style="background: green">{{ $o->status }}</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div style="text-align: right;">
                                                    <span style="text-align:right">{{ date_format(date_create($o->date_purchase), 'd.m.Y') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    // Récupération des éléments du DOM
    const showFormBtnInfo = document.querySelector('#show-form-change-info');
    const formInfo = document.querySelector('#my-form-info');

    const showFormBtnMdp = document.querySelector('#show-form-change-mdp');
    const formMdp = document.querySelector('#my-form-mdp');

    const showFormBtnAdresse = document.querySelector('#show-form-change-adresse');
    const formAdresse = document.querySelector('#my-form-adresse');

    const showFormBtnAddAdresse = document.querySelector('#show-form-add-adresse');
    const formAddAddress = document.querySelector('#my-form-add-adresse');

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
