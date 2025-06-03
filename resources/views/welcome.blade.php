<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Մուտք - Հրամանների Կառավարման Հարթակ</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px; /* margin around the form */
        }

        .fade-in {
            opacity: 0;
            animation: fadeIn 0.8s ease-out forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        input:focus {
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.3);
        }

        button:hover {
            transform: translateY(-2px) scale(1.01);
            transition: transform 0.2s ease;
        }
    </style>
</head>
<body>
    <div class="fade-in w-full max-w-md bg-white shadow-lg rounded-xl p-8 text-gray-800">
        <h2 class="text-3xl font-bold text-center mb-8">Մուտք համակարգ</h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-6" novalidate>
            @csrf

            <div>
                <label for="email" class="block mb-2 font-semibold">Էլ․ փոստ</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none"
                    placeholder="օրինակ@mail.com"
                >
                @error('email')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block mb-2 font-semibold">Գաղտնաբառ</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none"
                    placeholder="********"
                >
                @error('password')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="inline-flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="form-checkbox h-4 w-4 text-indigo-600" />
                    <span>Հիշել ինձ</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-indigo-600 hover:underline font-semibold">
                    Մոռացե՞լ եք գաղտնաբառը
                </a>
            </div>

            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-lg shadow-md"
            >
                Մուտք
            </button>
        </form>
    </div>
</body>
</html>
