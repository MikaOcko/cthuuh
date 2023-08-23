<section>
    <h2>Gestion des produits</h2>

    <x-success-button class="my-6 justify-end">
        <!-- Lien pour créer un nouvel article : "products.create" -->
        <a href="{{ route('products.create') }}" title="Ajouter un produit" >
            Ajouter un produit
        </a>
    </x-success-button>

    <!-- Le tableau pour lister les produits -->
    <table border="1" >
        <thead>
            <tr>
                <th>Titre</th>
                <th colspan="2">Opérations</th>
            </tr>
        </thead>
        <tbody>
            {{-- Récupération des données de la liste des produits --}}
            @php
                $products = \App\Models\Product::all();
            @endphp
            <!-- On parcourt la collection de Product-->
            @foreach ($products as $product)
            <tr>
                <td>
                    <!-- Lien pour afficher un produit : "products.show" -->
                    <a href="{{ route('products.show', $product) }}" title="Voir le produit" >{{ $product->name }}</a>
                </td>
                <td>
                    <!-- Lien pour modifier un product : "products.edit" -->
                    <x-success-button>
                        <a href="{{ route('products.edit', $product) }}" title="Modifier le produit" >
                            Modifier
                        </a>
                    </x-success-button>
                </td>
                <td>
                    <!-- Formulaire pour supprimer un product : "products.destroy" -->
                    <x-danger-button>
                        <form method="POST" action="{{ route('products.destroy', $product) }}" >
                            <!-- CSRF token -->
                            @csrf
                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                            @method("DELETE")
                            <input type="submit" value="Supprimer" >
                        </form>
                    </x-danger-button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
