<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <title>Control de inventario</title>
</head>

<body>
    <main class="flex">
        <nav class="sidebar">
            <div class="mb-8 flex items-center gap-2">
                <img class="rounded-full max-w-[50px]" src="https://lh3.googleusercontent.com/a/ACg8ocK2GAvSNuwN-zRMJkMVv8UPMuwaDZVyBGHyPR-pU4ei1S4=s96-c-rg-br100"/>
                <div>
                    <p class="text-gray-300">Bienvenido {{ auth()->user()->name }}</p>
                    <p class="text-sm text-gray-300">{{ auth()->user()->email }}</p>
                    <p class="text-sm text-gray-300">{{ auth()->user()->role->name }}</p>
                </div>
            </div>
            

            <ul class="sidebar__menu">
                <a href="/" class="{{ request()->path() == '/' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item'  }}">
                    <i class="uil uil-estate"></i>
                    <span>Inicio</span>
                </a>


                <a href="/products" class="{{ request()->path() == 'products' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item'  }}">
                    <i class="uil uil-shopping-bag"></i>
                    <span>Productos</span>
                </a>

                <a href="{{ route('categories.index') }}" class="{{ request()->path() == 'categories' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item'  }}">
                    <i class="uil uil-clipboard-notes"></i>
                    <span>Categorias</span>
                </a>


                @if ( auth()->user()->role->name == 'Administrador')
                    <a href="/users" class="{{ request()->path() == 'users' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item'  }}">
                        <i class="uil uil-users-alt"></i>
                        <span>Usuarios</span>
                    </a>
                @endif

                
                @if ( auth()->user()->role->name == 'Administrador')
                    <a href="/sales" class="{{ request()->path() == 'sales' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item'  }}">
                        <i class="uil uil-shopping-cart-alt"></i>
                        <span>Ventas</span>
                    </a>
                @endif

                <a href="/order" class="{{ request()->path() == 'order' ? 'sidebar__menu--item sidebar__menu--active' : 'sidebar__menu--item'  }}">
                    <i class="uil uil-box"></i>
                    <span>Pedidos</span>
                </a>
            </ul>
            
            <div class="flex-1"></div>

            <form method="POST" action="{{ route('logout.store') }}" class="w-full">
                @csrf
                <button type="submit" class="sidebar__menu--logout">
                    <i class="uil uil-signout"></i>
                    <span>Cerrar Sesion</span>
                </button>
            </form>
        </nav>

        <section class="p-8 w-full overflow-y-auto h-screen">
            
            @yield('header')
            @yield('contenido')

            
        </section>

    </main>
</body>

</html>
