<li class="menu-title">
    <span>Contenu</span>
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
<li class="menu-title">
    <span>MENUS</span>
</li>
{{-- Accueil --}}
<li class="{{ request()->is('admin') ? 'active' : '' }}">
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
    <a href="#"><i class="fe fe-file-word"></i> <span> Redactions</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        <li><a class="{{ request()->is('redaction/create') ? 'active' : '' }}" href="{{ route('redaction.create') }}">Ajouter</a></li>
        <li><a class="{{ request()->is('redaction/index') ? 'active' : '' }}" href="{{ route('redaction.index') }}">Liste</a></li>
    </ul>
</li>
