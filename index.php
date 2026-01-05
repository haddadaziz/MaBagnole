<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Database;
use App\Model\User;

?>

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaBagnole - Location de Voitures</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#2563EB',   // Bleu roi (Action)
                        primary_hover: '#1D4ED8',
                        dark: '#0F172A',      // Bleu nuit très sombre (Textes)
                        light: '#F8FAFC',     // Gris très clair (Fonds)
                        gray_text: '#64748B'  // Gris moyen (Descriptions)
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-light text-dark font-sans antialiased">

    <nav
        class="fixed w-full z-50 top-0 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="index.php" class="flex items-center gap-2 group">
                    <div
                        class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                        <i class="fa-solid fa-car-side text-xl"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-dark">MaBagnole<span
                            class="text-primary">.</span></span>
                </a>

                <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="index.php" class="text-primary font-semibold">Catalogue</a>
                    <a href="blog.php" class="text-gray-600 hover:text-primary transition">Blog & Communauté</a>
                </div>

                <div class="flex items-center gap-4">
                    <a href="login.php"
                        class="hidden md:block text-sm font-medium text-gray-600 hover:text-primary transition">Connexion</a>
                    <a href="register.php"
                        class="px-5 py-2.5 bg-dark text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition shadow-lg">
                        Inscription
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 text-primary text-xs font-semibold uppercase tracking-wide mb-6 border border-blue-100">
                    <span class="w-2 h-2 rounded-full bg-primary"></span> Nouvelle flotte 2024
                </div>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight text-dark mb-6 leading-tight">
                    Louez simplement, <br /> roulez <span class="text-primary">librement</span>.
                </h1>
                <p class="text-lg text-gray_text mb-10 leading-relaxed">
                    Accédez à plus de 500 véhicules disponibles immédiatement. Transparence totale, sans frais cachés.
                </p>

                <form action="index.php" method="GET"
                    class="bg-white p-2 rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.1)] border border-gray-100 flex flex-col md:flex-row gap-2 max-w-2xl mx-auto">
                    <div class="relative flex-1">
                        <i
                            class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <input type="text" name="search" placeholder="Modèle (ex: Clio, Golf...)"
                            class="w-full bg-gray-50 text-dark pl-11 pr-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 transition placeholder-gray-400 font-medium">
                    </div>

                    <div class="relative w-full md:w-1/3">
                        <i
                            class="fa-solid fa-layer-group absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        <select name="categorie"
                            class="w-full bg-gray-50 text-dark pl-11 pr-10 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 appearance-none cursor-pointer font-medium">
                            <option value="">Catégorie</option>
                            <option value="1">Économique</option>
                            <option value="2">SUV & Familiale</option>
                            <option value="3">Premium</option>
                        </select>
                        <i
                            class="fa-solid fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                    </div>

                    <button type="submit"
                        class="bg-primary hover:bg-primary_hover text-white font-bold px-8 py-3 rounded-xl transition duration-200 shadow-lg shadow-blue-500/30">
                        Rechercher
                    </button>
                </form>
            </div>
        </div>

        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full z-0 opacity-40 pointer-events-none">
            <div
                class="absolute top-20 left-20 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
            </div>
            <div
                class="absolute top-20 right-20 w-72 h-72 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
            </div>
        </div>
    </div>

    <section class="max-w-7xl mx-auto px-6 py-16" id="catalogue">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b border-gray-200 pb-6">
            <div>
                <h2 class="text-3xl font-bold text-dark">Véhicules disponibles</h2>
                <p class="text-gray_text mt-2">Choisissez le véhicule adapté à vos besoins.</p>
            </div>
            <div class="flex gap-2 mt-4 md:mt-0 overflow-x-auto pb-2">
                <button
                    class="px-4 py-2 bg-dark text-white rounded-lg text-sm font-medium transition whitespace-nowrap">Tout
                    voir</button>
                <button
                    class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:border-primary hover:text-primary transition whitespace-nowrap">Éco</button>
                <button
                    class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:border-primary hover:text-primary transition whitespace-nowrap">SUV</button>
                <button
                    class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:border-primary hover:text-primary transition whitespace-nowrap">Premium</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <div
                class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 group flex flex-col h-full overflow-hidden">

                <div class="relative h-56 overflow-hidden bg-gray-100">
                    <img src="https://i.ytimg.com/vi/-vOmRpnbFM4/maxresdefault.jpg" alt="Car"
                        class="w-full h-full object-cover mix-blend-multiply group-hover:scale-105 transition duration-500">

                    <span
                        class="absolute top-4 left-4 bg-white/90 backdrop-blur text-dark text-xs font-bold px-3 py-1.5 rounded-md shadow-sm border border-gray-100">
                        SPORT
                    </span>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="text-xl font-bold text-dark group-hover:text-primary transition">Audi RS5</h3>
                            <p class="text-xs text-gray-400 font-medium">Coupé Sport • Auto</p>
                        </div>
                        <div
                            class="flex items-center gap-1 bg-green-50 px-2 py-1 rounded text-green-700 text-xs font-bold">
                            <i class="fa-solid fa-star"></i> 4.9
                        </div>
                    </div>

                    <div class="flex gap-4 mb-6 border-t border-gray-50 pt-4">
                        <div class="flex items-center gap-2 text-gray-500 text-sm" title="Places">
                            <i class="fa-solid fa-user-group text-gray-300"></i> 4
                        </div>
                        <div class="flex items-center gap-2 text-gray-500 text-sm" title="Carburant">
                            <i class="fa-solid fa-gas-pump text-gray-300"></i> Essence
                        </div>
                        <div class="flex items-center gap-2 text-gray-500 text-sm" title="Transmission">
                            <i class="fa-solid fa-gears text-gray-300"></i> Auto
                        </div>
                    </div>

                    <div class="mt-auto flex items-center justify-between gap-3">
                        <div>
                            <span class="text-2xl font-bold text-dark">120€</span>
                            <span class="text-sm text-gray-400">/jour</span>
                        </div>

                        <div class="flex gap-2">
                            <a href="details.php?id=1"
                                class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 hover:text-dark transition">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="reservation.php?id=1"
                                class="px-5 py-2.5 bg-primary hover:bg-primary_hover text-white text-sm font-bold rounded-lg shadow-md hover:shadow-lg transition flex items-center gap-2">
                                Réserver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 group flex flex-col h-full overflow-hidden">
                <div class="relative h-56 overflow-hidden bg-gray-100">
                    <img src="https://mauto.ma/_next/image?url=https%3A%2F%2Fcdn.mauto.ma%2Fnewmauto%2Fimages%2Fimages-gallery-cars%2Ffiat-500-gallery_0.png&w=1080&q=75"
                        class="w-full h-full object-cover mix-blend-multiply group-hover:scale-105 transition duration-500">
                    <span
                        class="absolute top-4 left-4 bg-white/90 backdrop-blur text-dark text-xs font-bold px-3 py-1.5 rounded-md shadow-sm border border-gray-100">ÉCO</span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex justify-between items-start mb-3">
                        <div>
                            <h3 class="text-xl font-bold text-dark group-hover:text-primary transition">Fiat 500</h3>
                            <p class="text-xs text-gray-400 font-medium">Citadine • Manuelle</p>
                        </div>
                        <div
                            class="flex items-center gap-1 bg-green-50 px-2 py-1 rounded text-green-700 text-xs font-bold">
                            <i class="fa-solid fa-star"></i> 4.5
                        </div>
                    </div>
                    <div class="flex gap-4 mb-6 border-t border-gray-50 pt-4">
                        <div class="flex items-center gap-2 text-gray-500 text-sm"><i
                                class="fa-solid fa-user-group text-gray-300"></i> 4</div>
                        <div class="flex items-center gap-2 text-gray-500 text-sm"><i
                                class="fa-solid fa-gas-pump text-gray-300"></i> Hybride</div>
                        <div class="flex items-center gap-2 text-gray-500 text-sm"><i
                                class="fa-solid fa-gears text-gray-300"></i> Manuelle</div>
                    </div>
                    <div class="mt-auto flex items-center justify-between gap-3">
                        <div>
                            <span class="text-2xl font-bold text-dark">45€</span>
                            <span class="text-sm text-gray-400">/jour</span>
                        </div>
                        <div class="flex gap-2">
                            <a href="#"
                                class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 hover:text-dark transition"><i
                                    class="fa-solid fa-eye"></i></a>
                            <a href="#"
                                class="px-5 py-2.5 bg-primary hover:bg-primary_hover text-white text-sm font-bold rounded-lg shadow-md hover:shadow-lg transition flex items-center gap-2">Réserver</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-16 flex justify-center">
            <nav class="inline-flex rounded-lg shadow-sm border border-gray-200 bg-white">
                <a href="#"
                    class="px-4 py-2 text-gray-500 hover:text-primary hover:bg-gray-50 border-r border-gray-200 rounded-l-lg transition">Précédent</a>
                <a href="#" class="px-4 py-2 bg-primary text-white border-r border-primary">1</a>
                <a href="#"
                    class="px-4 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 border-r border-gray-200 transition">2</a>
                <a href="#"
                    class="px-4 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 border-r border-gray-200 transition">3</a>
                <a href="#"
                    class="px-4 py-2 text-gray-500 hover:text-primary hover:bg-gray-50 rounded-r-lg transition">Suivant</a>
            </nav>
        </div>
    </section>

    <footer class="bg-white border-t border-gray-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div>
                <a href="#" class="text-xl font-bold text-dark mb-4 block">MaBagnole<span
                        class="text-primary">.</span></a>
                <p class="text-gray_text text-sm leading-relaxed">
                    Votre partenaire de confiance pour la location de véhicules. Simple, rapide et transparent.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-dark mb-4">Entreprise</h4>
                <ul class="space-y-2 text-sm text-gray_text">
                    <li><a href="#" class="hover:text-primary transition">À propos</a></li>
                    <li><a href="#" class="hover:text-primary transition">Carrières</a></li>
                    <li><a href="#" class="hover:text-primary transition">Blog</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-dark mb-4">Support</h4>
                <ul class="space-y-2 text-sm text-gray_text">
                    <li><a href="#" class="hover:text-primary transition">Centre d'aide</a></li>
                    <li><a href="#" class="hover:text-primary transition">Conditions générales</a></li>
                    <li><a href="#" class="hover:text-primary transition">Confidentialité</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-dark mb-4">Newsletter</h4>
                <div class="flex flex-col gap-2">
                    <input type="email" placeholder="Email"
                        class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-primary">
                    <button
                        class="bg-dark text-white text-sm font-bold py-2 rounded-lg hover:bg-gray-800 transition">S'abonner</button>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-100 pt-8 text-center">
            <p class="text-gray-400 text-xs">&copy; 2024 MaBagnole SAS. Tous droits réservés.</p>
        </div>
    </footer>

</body>

</html>