<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();

// use App\Model\Article; // À décommenter plus tard
?>

<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        primary: '#2563EB',
                        primary_hover: '#1D4ED8',
                        dark: '#0F172A',
                        light: '#F8FAFC',
                        gray_text: '#64748B'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-light text-dark font-sans antialiased">

    <nav class="fixed w-full z-50 top-0 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="index.php" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white shadow-lg shadow-blue-500/30">
                        <i class="fa-solid fa-car-side text-xl"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-dark">MaBagnole<span class="text-primary">.</span></span>
                </a>
                <div class="hidden md:flex items-center space-x-8 text-sm font-medium">
                    <a href="index.php" class="text-gray-600 hover:text-primary transition">Catalogue</a>
                    <a href="blog.php" class="text-primary font-semibold">Blog & Communauté</a> 
                </div>
                
                <div class="flex items-center gap-4">
                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="hidden md:flex flex-col text-right mr-2">
                            <span class="text-sm font-bold text-dark">
                                <?= htmlspecialchars($_SESSION['user']['nom_complet'] ?? 'Mon Compte') ?>
                            </span>
                            <span class="text-xs text-green-600 font-bold">Connecté</span>
                        </div>
                        <a href="mes-reservations.php" class="text-gray-600 hover:text-primary text-sm font-medium hidden md:block">
                            <i class="fa-solid fa-calendar-check text-lg"></i>
                        </a>
                        <a href="logout.php" class="px-4 py-2 bg-red-50 text-red-600 text-sm font-semibold rounded-lg hover:bg-red-100 transition border border-red-100">
                            <i class="fa-solid fa-power-off"></i>
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="hidden md:block text-sm font-medium text-gray-600 hover:text-primary transition">Connexion</a>
                        <a href="register.php" class="px-5 py-2.5 bg-dark text-white text-sm font-semibold rounded-lg hover:bg-gray-800 transition shadow-lg">Inscription</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </nav>

    <div class="pt-32 pb-12 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold tracking-tight text-dark mb-4">Le Blog Automobile</h1>
            <p class="text-lg text-gray_text max-w-2xl mx-auto">
                Partagez vos expériences de conduite, découvrez nos roadtrips et échangez avec la communauté MaBagnole.
            </p>
            
            <div class="mt-8 flex flex-col md:flex-row justify-between items-center gap-4 max-w-4xl mx-auto">
                <div class="relative w-full md:w-2/3">
                    <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" placeholder="Rechercher un article..." class="w-full bg-gray-50 border border-gray-200 text-dark pl-11 pr-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 transition">
                </div>
                
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="create_article.php" class="w-full md:w-auto px-6 py-3 bg-primary hover:bg-primary_hover text-white font-bold rounded-xl transition shadow-lg shadow-blue-500/30 flex items-center justify-center gap-2 whitespace-nowrap">
                        <i class="fa-solid fa-pen-nib"></i> Rédiger un article
                    </a>
                <?php endif; ?>
            </div>
            
            <div class="mt-6 flex flex-wrap justify-center gap-2">
                <a href="#" class="px-4 py-1.5 rounded-full bg-blue-50 text-primary text-sm font-semibold hover:bg-blue-100 transition">#Roadtrip</a>
                <a href="#" class="px-4 py-1.5 rounded-full bg-gray-100 text-gray_text text-sm font-semibold hover:bg-gray-200 transition">#Mécanique</a>
                <a href="#" class="px-4 py-1.5 rounded-full bg-gray-100 text-gray_text text-sm font-semibold hover:bg-gray-200 transition">#Tests</a>
                <a href="#" class="px-4 py-1.5 rounded-full bg-gray-100 text-gray_text text-sm font-semibold hover:bg-gray-200 transition">#Nouveautés</a>
            </div>
        </div>
    </div>

    <section class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <article class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 group flex flex-col h-full overflow-hidden">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         alt="Roadtrip" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-primary text-xs font-bold px-3 py-1.5 rounded-md shadow-sm">
                        ROADTRIP
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-3">
                        <span><i class="fa-regular fa-calendar"></i> 12 Jan 2026</span>
                        <span>•</span>
                        <span><i class="fa-regular fa-user"></i> Par Yassine</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition line-clamp-2">
                        Mon voyage à Marrakech en Lamborghini Urus : Une expérience inoubliable
                    </h3>
                    <p class="text-gray_text text-sm mb-6 line-clamp-3">
                        Découvrez comment la location de ce SUV sportif a transformé notre séjour dans le sud du Maroc. Performance, confort et paysages à couper le souffle...
                    </p>
                    <div class="mt-auto pt-4 border-t border-gray-50 flex justify-between items-center">
                        <div class="flex items-center gap-4 text-gray-400 text-sm">
                            <span class="hover:text-red-500 cursor-pointer transition"><i class="fa-regular fa-heart"></i> 42</span>
                            <span class="hover:text-primary cursor-pointer transition"><i class="fa-regular fa-comment"></i> 12</span>
                        </div>
                        <a href="article.php?id=1" class="text-primary font-bold text-sm hover:underline">Lire la suite &rarr;</a>
                    </div>
                </div>
            </article>

            <article class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 group flex flex-col h-full overflow-hidden">
                <div class="relative h-56 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         alt="Entretien" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur text-dark text-xs font-bold px-3 py-1.5 rounded-md shadow-sm">
                        CONSEIL
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex items-center gap-2 text-xs text-gray-400 mb-3">
                        <span><i class="fa-regular fa-calendar"></i> 10 Jan 2026</span>
                        <span>•</span>
                        <span><i class="fa-regular fa-user"></i> Admin</span>
                    </div>
                    <h3 class="text-xl font-bold text-dark mb-3 group-hover:text-primary transition">
                        Comment bien inspecter une voiture de location ?
                    </h3>
                    <p class="text-gray_text text-sm mb-6 line-clamp-3">
                        Avant de prendre la route, quelques vérifications s'imposent pour éviter les mauvaises surprises. Voici notre checklist ultime.
                    </p>
                    <div class="mt-auto pt-4 border-t border-gray-50 flex justify-between items-center">
                        <div class="flex items-center gap-4 text-gray-400 text-sm">
                            <span class="hover:text-red-500 cursor-pointer transition"><i class="fa-regular fa-heart"></i> 15</span>
                            <span class="hover:text-primary cursor-pointer transition"><i class="fa-regular fa-comment"></i> 3</span>
                        </div>
                        <a href="article.php?id=2" class="text-primary font-bold text-sm hover:underline">Lire la suite &rarr;</a>
                    </div>
                </div>
            </article>

        </div>

        <div class="mt-16 flex justify-center">
            <nav class="inline-flex rounded-lg shadow-sm border border-gray-200 bg-white">
                <a href="#" class="px-4 py-2 text-gray-500 hover:text-primary hover:bg-gray-50 border-r border-gray-200 rounded-l-lg transition">Précédent</a>
                <a href="#" class="px-4 py-2 bg-primary text-white border-r border-primary">1</a>
                <a href="#" class="px-4 py-2 text-gray-700 hover:text-primary hover:bg-gray-50 border-r border-gray-200 transition">2</a>
                <a href="#" class="px-4 py-2 text-gray-500 hover:text-primary hover:bg-gray-50 rounded-r-lg transition">Suivant</a>
            </nav>
        </div>
    </section>
</body>
</html>