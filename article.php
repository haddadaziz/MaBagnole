<?php require_once __DIR__ . '/vendor/autoload.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Titre Article - MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: { primary: '#2563EB', primary_hover: '#1D4ED8', dark: '#0F172A', light: '#F8FAFC', gray_text: '#64748B' }
                }
            }
        }
    </script>
</head>
<body class="bg-light text-dark font-sans antialiased">

    <nav class="fixed w-full z-50 top-0 bg-white/90 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <a href="index.php" class="flex items-center gap-2">
                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center text-white"><i class="fa-solid fa-car-side"></i></div>
                <span class="text-xl font-bold text-dark">MaBagnole<span class="text-primary">.</span></span>
            </a>
            <a href="blog.php" class="text-sm font-medium text-gray-600 hover:text-primary"><i class="fa-solid fa-arrow-left mr-2"></i>Retour au blog</a>
        </div>
    </nav>

    <article class="pt-32 pb-16">
        <div class="max-w-4xl mx-auto px-6">
            
            <div class="mb-8 text-center">
                <div class="flex justify-center gap-2 mb-4">
                    <span class="bg-blue-50 text-primary text-xs font-bold px-3 py-1 rounded-full uppercase">Roadtrip</span>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold text-dark mb-6 leading-tight">Mon voyage à Marrakech en Lamborghini Urus</h1>
                <div class="flex items-center justify-center gap-6 text-sm text-gray_text">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center"><i class="fa-solid fa-user text-gray-500"></i></div>
                        <span class="font-medium text-dark">Yassine</span>
                    </div>
                    <span><i class="fa-regular fa-calendar mr-1"></i> 12 Jan 2026</span>
                    <span><i class="fa-regular fa-clock mr-1"></i> 5 min de lecture</span>
                </div>
            </div>

            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                 class="w-full h-[400px] object-cover rounded-2xl shadow-lg mb-12">

            <div class="prose prose-lg prose-blue max-w-none text-gray_text leading-relaxed">
                <p class="mb-6">C'était un rêve depuis longtemps : parcourir les routes sinueuses de l'Atlas au volant d'un monstre de puissance. Grâce à MaBagnole, ce rêve est devenu réalité...</p>
                <h2 class="text-2xl font-bold text-dark mt-8 mb-4">La prise en main du véhicule</h2>
                <p class="mb-6">L'intérieur de l'Urus est un cockpit d'avion. Les écrans, le cuir, l'odeur du neuf... Tout respire le luxe. Le démarrage du moteur V8 est un événement en soi.</p>
                </div>

            <div class="mt-12 py-6 border-t border-b border-gray-100 flex justify-between items-center">
                <div class="flex gap-4">
                    <button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-50 hover:bg-red-50 hover:text-red-500 transition text-gray-600 font-medium">
                        <i class="fa-regular fa-heart"></i> J'aime (42)
                    </button>
                    <button class="flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-50 hover:bg-yellow-50 hover:text-yellow-500 transition text-gray-600 font-medium">
                        <i class="fa-regular fa-bookmark"></i> Sauvegarder
                    </button>
                </div>
                <div class="flex gap-2">
                    <button class="w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-600 hover:text-white transition flex items-center justify-center text-gray-600"><i class="fa-brands fa-twitter"></i></button>
                    <button class="w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-800 hover:text-white transition flex items-center justify-center text-gray-600"><i class="fa-brands fa-facebook"></i></button>
                </div>
            </div>

            <div class="mt-16">
                <h3 class="text-2xl font-bold text-dark mb-8 flex items-center gap-2">
                    Discussion <span class="text-base font-normal text-gray-400">(12 commentaires)</span>
                </h3>

                <form class="mb-12 bg-white p-6 rounded-2xl border border-gray-100 shadow-sm">
                    <div class="flex gap-4 mb-4">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold flex-shrink-0">M</div>
                        <div class="w-full">
                            <textarea class="w-full bg-gray-50 border border-gray-200 rounded-xl p-4 text-dark focus:outline-none focus:ring-2 focus:ring-primary/20 transition resize-none" rows="3" placeholder="Partagez votre avis..."></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="px-6 py-2.5 bg-primary hover:bg-primary_hover text-white font-bold rounded-xl transition">Publier</button>
                    </div>
                </form>

                <div class="space-y-8">
                    
                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold flex-shrink-0">JD</div>
                        <div>
                            <div class="bg-gray-50 p-4 rounded-xl rounded-tl-none">
                                <div class="flex justify-between items-center mb-1">
                                    <h4 class="font-bold text-dark">Jean Dupont</h4>
                                    <span class="text-xs text-gray-400">Il y a 2 heures</span>
                                </div>
                                <p class="text-gray-700 text-sm">Super article ! Est-ce que la consommation était raisonnable pour un roadtrip ?</p>
                            </div>
                            <div class="flex gap-4 mt-1 ml-2 text-xs text-gray-500 font-medium">
                                <button class="hover:text-primary">Répondre</button>
                                <button class="hover:text-red-500">Signaler</button>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white font-bold flex-shrink-0">M</div>
                        <div>
                            <div class="bg-blue-50/50 border border-blue-100 p-4 rounded-xl rounded-tl-none">
                                <div class="flex justify-between items-center mb-1">
                                    <h4 class="font-bold text-dark">Moi (Auteur)</h4>
                                    <div class="flex gap-2">
                                        <button class="text-xs text-primary font-semibold hover:underline">Modifier</button>
                                        <button class="text-xs text-red-500 font-semibold hover:underline">Supprimer</button>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-sm">Merci Jean ! Honnêtement, elle consomme pas mal, mais le plaisir vaut chaque centime 😉.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </article>

    </body>
</html>