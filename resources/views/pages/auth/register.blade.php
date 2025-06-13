<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inscription</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold mb-6 text-center">Inscription</h2>
    <form id="registerForm">
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
            <input type="text" id="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" id="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">Mot de passe</label>
            <input type="password" id="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600" required>
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">S'inscrire</button>
    </form>
    <p class="mt-4 text-center">Déjà un compte ? <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700">Se connecter</a></p>
</div>

<script>
    document.getElementById('registerForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const password_confirmation = document.getElementById('password_confirmation').value;

        try {
            const response = await fetch('/api/register', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ name, email, password, password_confirmation }),
            });

            const data = await response.json();
            if (response.ok) {
                // Stocker le token dans le localStorage ou sessionStorage
                localStorage.setItem('token', data.token);
                localStorage.setItem('user', JSON.stringify(data.user));
                // Rediriger vers une page après inscription
                window.location.href = '/dashboard';
            } else {
                alert(data.message || 'Erreur lors de l\'inscription');
            }
        } catch (error) {
            console.error('Erreur:', error);
            alert('Une erreur est survenue.');
        }
    });
</script>
</body>
</html>
