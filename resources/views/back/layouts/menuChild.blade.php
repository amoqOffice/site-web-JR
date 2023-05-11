<li class="menu-title">
    <span>CONTENU</span>
</li>
<li class="{{ request()->is('admin') ? 'active' : '' }}">
    <a href="{{ route('back.home') }}">
        <i class="fe fe-home text-primary"></i>
        <span>Dashboard</span>
    </a>
</li>

{{-- Enseignements --}}
{{-- <li class="{{ request()->is('admin/enseignement/*') ? 'active' : '' }}">
    <a href="{{ route('enseignement.index') }}">
      <i class="fe fe-book text-success"></i>
      <span> Enseignements</span>
      <span class="badge badge-danger text-light">{{ App\Enseignement::count() }}</span>
    </a>
</li> --}}

{{-- <li class="submenu my-2">
    <a href="#"><i class="fe fe-book text-success"></i> <span> Enseignements</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <!-- <li><a class="{{ request()->is('admin/enseignement/create') ? 'active' : '' }}" href="{{ route('enseignement.create') }}">Ajouter</a></li> -->
        <!-- <li><a class="{{ request()->is('admin/enseignement/index') ? 'active' : '' }}" href="{{ route('enseignement.index') }}">Liste</a></li> -->
    </ul>
</li> --}}

{{-- Accueil --}}
<li class="{{ request()->is('admin/accueil/index') ? 'active':'' }}">
    <a href="{{ route('back.accueil.index') }}">
        <i class="fe fe-home text-primary"></i>
        <span>Accueil</span>
    </a>
</li>

{{-- 
Enseignements
Evangelisations
Article
Commentaire
Emissions
Evenements
Programmes
A Propos 
--}}{{-- Redactions --}}
<li class="submenu my-2">
    <a href="#"><i class="fe fe-file-word"></i> <span> Rédactions</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a class="{{ request()->is('admin/redaction/create') ? 'active' : '' }}" href="{{ route('back.redaction.create') }}">Ajouter</a></li>
        <li><a class="{{ request()->is('admin/redaction/index') ? 'active' : '' }}" href="{{ route('back.redaction.index') }}">Liste</a></li>
    </ul>
</li>
{{-- Reseaux sociaux --}}
<li class="submenu my-2">
    <a href="#"><i class="fe fe-google text-danger"></i> <span> Réseaux sociaux</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a class="{{ request()->is('reseau/create') ? 'active' : '' }}" href="{{ route('back.reseau.create') }}">Ajouter</a></li>
        <li><a class="{{ request()->is('reseau/index') ? 'active' : '' }}" href="{{ route('back.reseau.index') }}">Liste</a></li>
    </ul>
</li>
{{-- Categories --}}
<li class="submenu my-2">
    <a href="#"><i class="fe fe-list-bullet"></i> <span> Catégories</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a class="{{ request()->is('categorie/create') ? 'active' : '' }}" href="{{ route('back.categorie.create') }}">Ajouter</a></li>
        <li><a class="{{ request()->is('categorie/index') ? 'active' : '' }}" href="{{ route('back.categorie.index') }}">Liste</a></li>
    </ul>
</li>
