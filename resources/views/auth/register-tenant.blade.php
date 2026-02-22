<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - AuditPulse AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center h-screen">
    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Start Your Free Audit</h2>
        
        <form action="{{ route('register.tenant.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Company Name</label>
                <input type="text" name="company_name" class="w-full mt-1 p-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Your Name</label>
                <input type="text" name="name" class="w-full mt-1 p-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" class="w-full mt-1 p-2 border rounded-md" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" class="w-full mt-1 p-2 border rounded-md" required>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" class="w-full mt-1 p-2 border rounded-md" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Create Account
            </button>
        </form>
    </div>
</body>
</html>