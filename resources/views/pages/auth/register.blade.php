@extends('layouts.base')
@section("body")

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-br from-indigo-400/20 to-pink-400/20 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-60 h-60 bg-gradient-to-br from-purple-400/10 to-blue-400/10 rounded-full blur-3xl animate-pulse delay-500"></div>
        </div>

        <div class="relative bg-white/80 backdrop-blur-xl p-8 rounded-2xl shadow-2xl w-full max-w-md border border-white/20">
            <!-- Logo/Brand section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl mb-4 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </div>
                <h2 class="text-3xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-2">Inscription</h2>
                <p class="text-gray-600">Créez votre compte gratuitement</p>
            </div>

            <form id="registerForm" class="space-y-5">
                <div class="group">
                    <label for="name" class="block text-gray-700 font-semibold mb-2 transition-colors group-focus-within:text-indigo-600">
                        Nom complet
                    </label>
                    <div class="relative">
                        <input type="text" id="name"
                               class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white"
                               placeholder="Votre nom complet" required>
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                </div>

                <div class="group">
                    <label for="email" class="block text-gray-700 font-semibold mb-2 transition-colors group-focus-within:text-indigo-600">
                        Email
                    </label>
                    <div class="relative">
                        <input type="email" id="email"
                               class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white"
                               placeholder="votre@email.com" required>
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                        </svg>
                    </div>
                </div>

                <div class="group">
                    <label for="password" class="block text-gray-700 font-semibold mb-2 transition-colors group-focus-within:text-indigo-600">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <input type="password" id="password"
                               class="w-full px-4 py-3 pl-12 pr-12 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white"
                               placeholder="••••••••" required>
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        <button type="button" id="togglePassword" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Password strength indicator -->
                    <div class="mt-2">
                        <div class="flex space-x-1">
                            <div id="strength-1" class="h-1 w-1/4 bg-gray-200 rounded-full transition-colors"></div>
                            <div id="strength-2" class="h-1 w-1/4 bg-gray-200 rounded-full transition-colors"></div>
                            <div id="strength-3" class="h-1 w-1/4 bg-gray-200 rounded-full transition-colors"></div>
                            <div id="strength-4" class="h-1 w-1/4 bg-gray-200 rounded-full transition-colors"></div>
                        </div>
                        <p id="strength-text" class="text-xs text-gray-500 mt-1">Entrez un mot de passe</p>
                    </div>
                </div>

                <div class="group">
                    <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2 transition-colors group-focus-within:text-indigo-600">
                        Confirmer le mot de passe
                    </label>
                    <div class="relative">
                        <input type="password" id="password_confirmation"
                               class="w-full px-4 py-3 pl-12 pr-12 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200 bg-gray-50/50 hover:bg-white focus:bg-white"
                               placeholder="••••••••" required>
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <button type="button" id="togglePasswordConfirm" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    <div id="password-match" class="mt-2 text-xs hidden">
                        <span id="match-text" class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Les mots de passe correspondent
                        </span>
                    </div>
                </div>

                <div class="flex items-start space-x-3">
                    <input type="checkbox" id="terms" class="mt-1 w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2" required>
                    <label for="terms" class="text-sm text-gray-600 leading-relaxed">
                        J'accepte les
                        <a href="#" class="text-indigo-600 hover:text-indigo-700 hover:underline">conditions d'utilisation</a>
                        et la
                        <a href="#" class="text-indigo-600 hover:text-indigo-700 hover:underline">politique de confidentialité</a>
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-3 px-6 rounded-xl font-semibold hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 transform hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl disabled:opacity-50 disabled:cursor-not-allowed">
                    <span class="flex items-center justify-center">
                        <span id="buttonText">Créer mon compte</span>
                        <svg id="buttonSpinner" class="animate-spin ml-2 h-5 w-5 text-white hidden" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </form>

            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-4 bg-white text-gray-500">ou</span>
                    </div>
                </div>

                <div class="mt-4 text-center">
                    <p class="text-gray-600">
                        Déjà un compte ?
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-semibold hover:underline transition-colors">
                            Se connecter
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggles
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });

        document.getElementById('togglePasswordConfirm').addEventListener('click', function() {
            const passwordInput = document.getElementById('password_confirmation');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });

        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            let feedback = "Entrez un mot de passe";

            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;

            // Reset all indicators
            for (let i = 1; i <= 4; i++) {
                document.getElementById(`strength-${i}`).className = "h-1 w-1/4 bg-gray-200 rounded-full transition-colors";
            }

            // Update strength indicators
            if (strength === 0) {
                feedback = "Mot de passe trop faible";
            } else if (strength <= 2) {
                feedback = "Mot de passe faible";
                document.getElementById('strength-1').className = "h-1 w-1/4 bg-red-400 rounded-full transition-colors";
            } else if (strength === 3) {
                feedback = "Mot de passe moyen";
                document.getElementById('strength-1').className = "h-1 w-1/4 bg-yellow-400 rounded-full transition-colors";
                document.getElementById('strength-2').className = "h-1 w-1/4 bg-yellow-400 rounded-full transition-colors";
            } else if (strength >= 4) {
                feedback = "Mot de passe fort";
                for (let i = 1; i <= 4; i++) {
                    document.getElementById(`strength-${i}`).className = "h-1 w-1/4 bg-green-400 rounded-full transition-colors";
                }
            }

            document.getElementById('strength-text').textContent = feedback;
            return strength;
        }

        // Password confirmation checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchDiv = document.getElementById('password-match');
            const matchText = document.getElementById('match-text');

            if (confirmPassword.length > 0) {
                matchDiv.classList.remove('hidden');
                if (password === confirmPassword) {
                    matchText.className = "flex items-center text-green-600";
                    matchText.innerHTML = `
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Les mots de passe correspondent
                    `;
                } else {
                    matchText.className = "flex items-center text-red-600";
                    matchText.innerHTML = `
                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Les mots de passe ne correspondent pas
                    `;
                }
            } else {
                matchDiv.classList.add('hidden');
            }
        }

        // Event listeners for password validation
        document.getElementById('password').addEventListener('input', function() {
            checkPasswordStrength(this.value);
            checkPasswordMatch();
        });

        document.getElementById('password_confirmation').addEventListener('input', checkPasswordMatch);

        // Form submission with validation
        document.getElementById('registerForm').addEventListener('submit', async (e) => {
            e.preventDefault();

            const submitButton = e.target.querySelector('button[type="submit"]');
            const buttonText = document.getElementById('buttonText');
            const buttonSpinner = document.getElementById('buttonSpinner');

            // Get form values
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;

            // Client-side validation
            if (!terms) {
                showErrorMessage('Vous devez accepter les conditions d\'utilisation.');
                return;
            }

            if (password !== password_confirmation) {
                showErrorMessage('Les mots de passe ne correspondent pas.');
                return;
            }

            if (checkPasswordStrength(password) < 3) {
                showErrorMessage('Veuillez choisir un mot de passe plus fort.');
                return;
            }

            // Show loading state
            submitButton.disabled = true;
            buttonText.textContent = 'Création du compte...';
            buttonSpinner.classList.remove('hidden');

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
                    // Success state
                    buttonText.textContent = 'Compte créé avec succès !';
                    buttonSpinner.classList.add('hidden');

                    // Store token and user data
                    localStorage.setItem('token', data.token);
                    localStorage.setItem('user', JSON.stringify(data.user));

                    // Show success message
                    showSuccessMessage('Votre compte a été créé avec succès ! Redirection en cours...');

                    // Redirect after a short delay
                    setTimeout(() => {
                        window.location.href = '/login';
                    }, 2000);
                } else {
                    throw new Error(data.message || 'Erreur lors de l\'inscription');
                }
            } catch (error) {
                console.error('Erreur:', error);

                // Error state
                submitButton.disabled = false;
                buttonText.textContent = 'Créer mon compte';
                buttonSpinner.classList.add('hidden');

                // Show error message
                showErrorMessage(error.message || 'Une erreur est survenue.');
            }
        });

        // Error message function
        function showErrorMessage(message) {
            removeExistingMessages();

            const errorDiv = document.createElement('div');
            errorDiv.className = 'error-message mt-4 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm';
            errorDiv.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    ${message}
                </div>
            `;

            const form = document.getElementById('registerForm');
            form.appendChild(errorDiv);

            setTimeout(() => {
                errorDiv.remove();
            }, 5000);
        }

        // Success message function
        function showSuccessMessage(message) {
            removeExistingMessages();

            const successDiv = document.createElement('div');
            successDiv.className = 'success-message mt-4 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm';
            successDiv.innerHTML = `
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    ${message}
                </div>
            `;

            const form = document.getElementById('registerForm');
            form.appendChild(successDiv);
        }

        // Remove existing messages
        function removeExistingMessages() {
            const existingError = document.querySelector('.error-message');
            const existingSuccess = document.querySelector('.success-message');
            if (existingError) existingError.remove();
            if (existingSuccess) existingSuccess.remove();
        }

        // Add input focus animations
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-[1.02]');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-[1.02]');
            });
        });
    </script>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #667eea, #764ba2);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #5a6fd8, #6a4190);
        }
    </style>
@endsection
