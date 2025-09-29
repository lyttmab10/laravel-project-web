<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - SE Department</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                        }
                    },
                    fontFamily: {
                        'thai': ['Noto Sans Thai', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-thai bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="max-w-sm w-full mx-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="text-center mb-6">
                <h1 class="text-lg font-semibold text-gray-800">Admin Access</h1>
                <p class="text-sm text-gray-600">SE Department</p>
            </div>

            <form id="loginForm" class="space-y-4">
                <div>
                    <input type="text" id="username" placeholder="Username" required
                           class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-primary-500 focus:border-primary-500 text-sm">
                </div>

                <div>
                    <input type="password" id="password" placeholder="Password" required
                           class="w-full px-3 py-2 border border-gray-300 rounded focus:ring-1 focus:ring-primary-500 focus:border-primary-500 text-sm">
                </div>

                <button type="submit" 
                        class="w-full bg-primary-600 text-white py-2 rounded text-sm font-medium hover:bg-primary-700 transition-colors">
                    Login
                </button>
            </form>

            <div id="message" class="hidden mt-3 p-2 rounded text-sm"></div>

            <div class="mt-4 pt-4 border-t border-gray-200">
                <a href="{{ route('home') }}" class="text-xs text-gray-500 hover:text-gray-700">← Back to website</a>
            </div>
        </div>

        <!-- Simple demo info -->
        <div class="mt-3 text-center">
            <p class="text-xs text-gray-400">Demo: admin / password123</p>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const messageDiv = document.getElementById('message');
            
            if (username === 'admin' && password === 'password123') {
                messageDiv.className = 'mt-3 p-2 rounded text-sm bg-green-100 text-green-800';
                messageDiv.textContent = 'Login successful! Redirecting...';
                messageDiv.classList.remove('hidden');
                
                setTimeout(() => {
                    window.location.href = '{{ route("admin.dashboard") }}';
                }, 1500);
            } else {
                messageDiv.className = 'mt-3 p-2 rounded text-sm bg-red-100 text-red-800';
                messageDiv.textContent = 'Invalid credentials. Please try again.';
                messageDiv.classList.remove('hidden');
            }
        });

        // Auto-fill demo credentials
        setTimeout(() => {
            document.getElementById('username').value = 'admin';
            document.getElementById('password').value = 'password123';
        }, 1000);
    </script>
</body>
</html>