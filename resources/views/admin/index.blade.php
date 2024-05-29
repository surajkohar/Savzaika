<x-admin-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto px-6 py-8">
            <!-- Page header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
            </div>
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-medium mb-2">Number of Users</h2>
                    <p class="text-3xl font-bold">{{ \App\Models\User::count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-medium mb-2">Number of Products</h2>
                    <p class="text-3xl font-bold">{{ \App\Models\Product::count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-medium mb-2">Number of Orders</h2>
                    <p class="text-3xl font-bold">{{ \App\Models\Order::count() }}</p>
                </div>
            </div>
            <!-- Charts -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-medium mb-4">Sales Chart</h2>
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-medium mb-4">Product Growth Chart</h2>
                    <canvas id="productChart" width="400" height="200"></canvas>
                </div>
            </div>
            <!-- Recent activities -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-medium mb-4">Recent Activities</h2>
                <!-- Activity feed goes here -->
                <div class="mt-4 space-y-6">
                    {{-- <p class="text-sm text-gray-600">No recent activities.</p> --}}
                    <p class="text-sm text-gray-600">Last Registered User: <span
                            class="font-bold">{{ \App\Models\User::latest()->first()->first_name }}</span></p>
                    <p class="text-sm text-gray-600 space-x-4">Latest Order:- OrderID: 
                        {{-- <span
                            class="font-bold">{{ \App\Models\Order::latest()->first()->id }}</span> By<span --}}
                            {{-- class="font-bold"> {{ \App\Models\Order::latest()->first()->user->first_name }}</span> --}}
                        {{-- <Link href="{{ route('admin.user.orderItem', \App\Models\Order::latest()->first()) }}"
                            class="text-green-400 bg-buttonColor1 p-2 rounded-lg text-white font-semibold">
                        View
                        </Link> --}}
                    </p>
                </div>
            </div>
        </div>

    </div>

</x-admin-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Sample data for the charts
    const salesData = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [{
            label: 'Sales',
            data: [50, 30, 60, 20, 80],
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.1
        }]
    };
    const productData = {
        labels: ["January", "February", "March", "April", "May"],
        datasets: [{
            label: 'Product Growth',
            data: [10, 20, 15, 25, 30],
            fill: false,
            borderColor: 'rgba(255, 99, 132, 1)',
            tension: 0.1
        }]
    };
    // Create charts
    const salesChart = new Chart(document.getElementById('salesChart').getContext('2d'), {
        type: 'line',
        data: salesData,
    });

    const productChart = new Chart(document.getElementById('productChart').getContext('2d'), {
        type: 'line',
        data: productData,
    });
</script>
