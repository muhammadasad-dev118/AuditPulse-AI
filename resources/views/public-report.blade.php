<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audit Report - AuditPulse AI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl p-8 text-center">
        <h1 class="text-2xl font-bold text-gray-800 mb-2">AuditPulse AI Report</h1>
        <p class="text-gray-500 mb-6">Website: <span class="text-blue-600 font-medium">{{ $report->site->url }}</span></p>
        
        <div class="relative inline-flex items-center justify-center mb-6">
            <div class="text-6xl font-black {{ $report->health_score >= 80 ? 'text-green-500' : 'text-red-500' }}">
                {{ $report->health_score }}%
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 text-sm mb-8">
            <div class="bg-gray-50 p-3 rounded-lg">
                <p class="text-gray-400 uppercase text-xs">Status</p>
                <p class="font-bold text-gray-700">{{ $report->meta_data['status'] ?? 'N/A' }}</p>
            </div>
            <div class="bg-gray-50 p-3 rounded-lg">
                <p class="text-gray-400 uppercase text-xs">Load Speed</p>
                <p class="font-bold text-gray-700">{{ $report->meta_data['load_speed'] ?? 'N/A' }}</p>
            </div>
        </div>

        <p class="text-[10px] text-gray-400">Generated on: {{ $report->created_at->format('M d, Y - H:i') }}</p>
    </div>
</body>
</html>