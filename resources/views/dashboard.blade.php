<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>TungLee Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#4338CA",
                        "background-light": "#F8FAFC",
                        "background-dark": "#0F172A",
                        "card-light": "#FFFFFF",
                        "card-dark": "#1E293B",
                        "text-light": "#0F172A",
                        "text-dark": "#E2E8F0",
                        "subtext-light": "#64748B",
                        "subtext-dark": "#94A3B8",
                        "border-light": "#E2E8F0",
                        "border-dark": "#334155",
                        "success-light": "#22C55E",
                        "success-dark": "#4ADE80",
                        "warning-light": "#F59E0B",
                        "warning-dark": "#FBBF24",
                        "info-light": "#3B82F6",
                        "info-dark": "#60A5FA",
                    },
                    fontFamily: {
                        display: ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                    },
                    boxShadow: {
                        'soft': '0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05)',
                        'soft-dark': '0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1)',
                    }
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* Skeleton Loading Animation */
        @keyframes shimmer {
            0% {
                background-position: -1000px 0;
            }

            100% {
                background-position: 1000px 0;
            }
        }

        .skeleton {
            background: #f6f7f8;
            background-image: linear-gradient(to right,
                    #f6f7f8 0%,
                    #edeef1 20%,
                    #f6f7f8 40%,
                    #f6f7f8 100%);
            background-repeat: no-repeat;
            background-size: 1000px 100%;
            animation: shimmer 2s infinite linear;
            display: inline-block;
            position: relative;
            min-height: 2.5rem;
            min-width: 6rem;
            border-radius: 0.375rem;
        }

        .dark .skeleton {
            background: #374151;
            background-image: linear-gradient(to right,
                    #374151 0%,
                    #4b5563 20%,
                    #374151 40%,
                    #374151 100%);
        }

        .chart-bar {
            transition: all 0.3s ease-in-out;
        }

        .chart-tooltip {
            opacity: 0;
            transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out;
            transform: translateY(10px);
            pointer-events: none;
        }

        .group:hover .chart-tooltip {
            opacity: 1;
            transform: translateY(0);
        }

        /* Chart.js styles */
        #trendsChart {
            position: relative;
            height: 400px;
            width: 100%;
        }

        @keyframes skeleton-loading {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        @keyframes chart-skeleton-pulse {
            0% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
            100% {
                opacity: 1;
            }
        }

        .skeleton {
            background: linear-gradient(90deg,
                    #f0f0f0 25%,
                    #e0e0e0 37%,
                    #f0f0f0 63%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s infinite linear;
            border-radius: 4px;
            display: inline-block;
            line-height: 1;
            width: 100%;
            min-height: 1em;
        }

        #chartSkeleton, #chartSkeletonXAxis, #chartSkeletonYAxis {
            opacity: 1;
            transition: opacity 0.3s ease-out;
        }

        #chartSkeleton.hidden, #chartSkeletonXAxis.hidden, #chartSkeletonYAxis.hidden {
            opacity: 0;
            pointer-events: none;
        }

        #chartSkeleton .skeleton {
            background: linear-gradient(90deg,
                    rgba(67, 56, 202, 0.1) 25%,
                    rgba(67, 56, 202, 0.2) 37%,
                    rgba(67, 56, 202, 0.1) 63%);
            background-size: 400% 100%;
            animation: skeleton-loading 2.5s infinite linear;
            border: 1px solid rgba(67, 56, 202, 0.2);
        }

        #chartSkeletonXAxis .skeleton,
        #chartSkeletonYAxis .skeleton {
            animation: skeleton-loading 1.5s infinite linear;
            background: linear-gradient(90deg,
                    #f0f0f0 25%,
                    #e0e0e0 37%,
                    #f0f0f0 63%);
        }

        .dark .skeleton {
            background: linear-gradient(90deg,
                    rgba(255, 255, 255, 0.1) 25%,
                    rgba(255, 255, 255, 0.15) 37%,
                    rgba(255, 255, 255, 0.1) 63%);
        }

        .dark #chartSkeleton .skeleton {
            background: rgba(67, 56, 202, 0.2);
            border: 1px solid rgba(67, 56, 202, 0.3);
        }

        .dark #chartSkeletonXAxis .skeleton,
        .dark #chartSkeletonYAxis .skeleton {
            background: linear-gradient(90deg,
                    rgba(255, 255, 255, 0.1) 25%,
                    rgba(255, 255, 255, 0.15) 37%,
                    rgba(255, 255, 255, 0.1) 63%);
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">
    <div class="flex h-screen">
        <aside class="w-64 flex-shrink-0 bg-card-light dark:bg-card-dark border-r border-border-light dark:border-border-dark flex flex-col">
            <div class="flex items-center justify-center h-20 border-b border-border-light dark:border-border-dark">
                <span class="material-icons text-primary text-4xl">insights</span>
                <h1 class="text-2xl font-bold ml-2">TungLee</h1>
            </div>
            <nav class="flex-grow p-4 space-y-2">
               
                <a class="flex items-center px-4 py-2 font-semibold text-white bg-primary rounded-md shadow-md" href="#">
                    <span class="material-icons mr-3">dashboard</span>
                    <span>Dashboard</span>
                </a>
                <a class="flex items-center px-4 py-2 text-subtext-light dark:text-subtext-dark hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" href="#">
                    <span class="material-icons mr-3">contacts</span>
                    <span>Contacts</span>
                </a>
                <a class="flex items-center px-4 py-2 text-subtext-light dark:text-subtext-dark hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" href="#">
                    <span class="material-icons mr-3">analytics</span>
                    <span>Analytics</span>
                </a>
                <a class="flex items-center px-4 py-2 text-subtext-light dark:text-subtext-dark hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" href="#">
                    <span class="material-icons mr-3">settings</span>
                    <span>Settings</span>
                </a>
            </nav>
         
        </aside>
        <div class="flex-1 flex flex-col">
            <header class="flex items-center justify-between p-6 border-b border-border-light dark:border-border-dark h-20 bg-card-light dark:bg-card-dark">
                <div>
                    <p class="text-sm text-subtext-light dark:text-subtext-dark">Dashboard / Sign-ups</p>
                    <h2 class="text-2xl font-bold">Coming Soon Page Sign-ups</h2>
                </div>
                <div class="flex items-center space-x-6">
                    <span class="material-icons text-subtext-light dark:text-subtext-dark cursor-pointer hover:text-text-light dark:hover:text-text-dark">search</span>
                    <span class="material-icons text-subtext-light dark:text-subtext-dark cursor-pointer hover:text-text-light dark:hover:text-text-dark">notifications_none</span>
                    <div class="flex items-center">
                        <img alt="Warren William avatar" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDFE9JFghVzfAAKo7vGRua1Ocw8QNZG3hstWnWRszGZoKYo00iozBFKA_BJywIVdUptdZrdStU_nS42Ggg2T7IW9qoeitOwjNb5dSLgFDwWcxpBOQ6DgHjT2g5TNWxJfea0ibJX0h0INsYISu6A_wxWCkp-zdhsNdzqQYKMGqV9jF5q5y1HrxGAX8Ochf3Arl4SATgRwwd6j8zh3o5twn5V0ASomnNB4tHrBItTFi6PqpncZ36d4mw7Lykreq68uoh788C7wA3JLHk" />
                        <div class="ml-3">
                            <p class="font-semibold">Warren William</p>
                            <p class="text-sm text-subtext-light dark:text-subtext-dark">Administrator</p>
                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-1 p-6 overflow-y-auto bg-background-light dark:bg-background-dark">
                <div class="flex items-center justify-between mb-6">
                    <div></div>
                    <div class="flex items-center space-x-4">
                        <button class="bg-primary text-white font-semibold py-2 px-4 rounded-md flex items-center hover:bg-primary/90 transition-colors">
                            Export Data
                            <span class="material-icons ml-2 text-base">file_download</span>
                        </button>
                    </div>
                </div>
                <div id="stats-section" class="grid grid-cols-1 lg:grid-cols-3 gap-6" data-loading="true">
                    <!-- Unique Contacts -->
                    <div class="bg-primary/10 dark:bg-primary/20 border border-primary p-4 rounded-lg flex items-center shadow-soft dark:shadow-soft-dark">
                        <div class="w-12 h-12 rounded-full bg-primary flex items-center justify-center text-white mr-4">
                            <span class="material-icons">people</span>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-primary">
                                <span class="content" id="uniqueContacts">0</span>
                            </div>
                            <p class="font-semibold text-text-light dark:text-text-dark">Unique Contacts</p>
                        </div>
                    </div>
                    <!-- Total Sign-ups -->
                    <div class="bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark p-4 rounded-lg flex items-center shadow-soft dark:shadow-soft-dark">
                        <div class="w-12 h-12 rounded-full border border-border-light dark:border-border-dark flex items-center justify-center text-subtext-light dark:text-subtext-dark mr-4">
                            <span class="material-icons">login</span>
                        </div>
                        <div>
                            <p class="text-3xl font-bold">
                                <span class="content " id="totalSignups">0</span>
                            </p>
                            <p class="font-semibold">Total Sign-ups</p>
                        </div>
                    </div>
                    <!-- Growth this week -->
                    <div class="bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark p-4 rounded-lg flex items-center shadow-soft dark:shadow-soft-dark">
                        <div class="w-12 h-12 rounded-full border border-border-light dark:border-border-dark flex items-center justify-center text-success-light dark:text-success-dark mr-4">
                            <span class="material-icons">trending_up</span>
                        </div>
                        <div>
                            <p class="text-3xl font-bold text-success-light dark:text-success-dark">
                                <span class="content" id="growthWeek">0%</span>
                            </p>
                            <p class="font-semibold">Growth this week</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 xl:grid-cols-5 gap-6 mt-6">
                    <div class="xl:col-span-3 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark p-6 rounded-lg shadow-soft dark:shadow-soft-dark">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-semibold text-lg">Sign-up Trends</h3>
                            <div class="flex items-center border border-border-light dark:border-border-dark rounded-md">
                                <button data-period="weekly" class="px-3 py-1 text-sm font-medium text-text-light dark:text-text-dark bg-gray-100 dark:bg-gray-700 rounded-l-md">Weekly</button>
                                <button data-period="monthly" class="px-3 py-1 text-sm text-subtext-light dark:text-subtext-dark hover:bg-gray-50 dark:hover:bg-gray-800">Monthly</button>
                                <!-- <button data-period="yearly" class="px-3 py-1 text-sm text-subtext-light dark:text-subtext-dark hover:bg-gray-50 dark:hover:bg-gray-800 rounded-r-md">Yearly</button> -->
                            </div>
                        </div>
                        <div class="h-80 relative overflow-hidden">
                            <canvas id="trendsChart" class="hidden"></canvas>
                            <div class="absolute inset-0 flex items-end gap-2 px-12 pb-10 transition-opacity duration-300" id="chartSkeleton">
                                <div class="flex-1 h-[40%] skeleton rounded"></div>
                                <div class="flex-1 h-[65%] skeleton rounded"></div>
                                <div class="flex-1 h-[45%] skeleton rounded"></div>
                                <div class="flex-1 h-[80%] skeleton rounded"></div>
                                <div class="flex-1 h-[35%] skeleton rounded"></div>
                                <div class="flex-1 h-[55%] skeleton rounded"></div>
                                <div class="flex-1 h-[70%] skeleton rounded"></div>
                            </div>
                            <!-- Skeleton X-axis -->
                            <div class="absolute bottom-0 left-0 right-0 h-8 flex items-center justify-between px-12" id="chartSkeletonXAxis">
                            </div>
                            <!-- Skeleton Y-axis -->
                            <div class="absolute top-2 left-0 bottom-8 w-10 flex flex-col justify-between py-2" id="chartSkeletonYAxis">
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-2 bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark p-6 rounded-lg shadow-soft dark:shadow-soft-dark">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="font-semibold text-lg">Recent Sign-up Logs</h3>
                            <span class="material-icons text-subtext-light dark:text-subtext-dark cursor-pointer">more_horiz</span>
                        </div>
                        <div id="recent-signups-section" class="space-y-4 recent-signups" data-loading="true">
                            <!-- Skeleton items will be added dynamically -->
                        </div>
                    </div>
                </div>
                <div class="bg-card-light dark:bg-card-dark border border-border-light dark:border-border-dark p-6 rounded-lg mt-6 shadow-soft dark:shadow-soft-dark">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-lg">All Sign-up Logs</h3>
                        <div class="flex items-center space-x-2">
                            <input class="form-input w-full md:w-64 rounded-md border-border-light dark:border-border-dark bg-background-light dark:bg-background-dark text-sm focus:ring-primary focus:border-primary" placeholder="Search contacts..." type="text" />
                            <button class="text-subtext-light dark:text-subtext-dark p-2 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700">
                                <span class="material-icons">filter_list</span>
                            </button>
                        </div>
                    </div>
                    <div id="all-logs-section" class="overflow-x-auto" data-loading="true">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="text-left text-subtext-light dark:text-subtext-dark border-b border-border-light dark:border-border-dark">
                                    <th class="py-3 px-4 font-normal"><input class="form-checkbox rounded text-primary focus:ring-primary" type="checkbox" /></th>
                                    <th class="py-3 px-4 font-normal">Name</th>
                                    <th class="py-3 px-4 font-normal">Email</th>
                                    <th class="py-3 px-4 font-normal">Phone</th>
                                    <th class="py-3 px-4 font-normal">Submission Timestamp</th>
                                    <th class="py-3 px-4 font-normal">Status</th>
                                </tr>
                            </thead>
                            <tbody id="logsTableBody">
                                <!-- Rows will be dynamically added here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Ensure skeleton is shown immediately on page load
            setLoading(true);

            // Add a small delay to ensure skeleton is rendered
            setTimeout(() => {
                // Fetch initial data
                Promise.all([
                    fetchStats(),
                    fetchTrends(),
                    fetchRecentSignups(),
                    fetchAllLogs()
                ]).catch(error => {
                    console.error('Error loading initial data:', error);
                }).finally(() => {
                    setLoading(false);
                });
            }, 100);

            // Loading state handler
            function setLoading(isLoading, sectionId = null) {
                // Force a small delay to ensure DOM is ready
                requestAnimationFrame(() => {
                    // Select containers based on sectionId
                    let containers;
                    if (sectionId) {
                        containers = document.querySelectorAll(`#${sectionId}[data-loading]`);
                    } else {
                        containers = document.querySelectorAll('[data-loading]');
                    }

                    containers.forEach(container => {
                        container.setAttribute('data-loading', isLoading);

                        container.querySelectorAll('.skeleton').forEach(skeleton => {
                            if (isLoading) {
                                skeleton.classList.remove('hidden');
                            } else {
                                skeleton.classList.add('hidden');
                            }
                        });

                        container.querySelectorAll('.content').forEach(content => {
                            if (isLoading) {
                                content.classList.add('hidden');
                            } else {
                                content.classList.remove('hidden');
                            }
                        });
                    });
                });
            }

            // Fetch stats with loading state
            async function fetchStats() {
                try {
                    setLoading(true, 'stats-section');
                    const response = await fetch('/api/stats');
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    const data = await response.json();
                    console.log('Stats API Response:', data); // Debug log

                    // Process data from API response format
                    const processedData = {
                        unique_contacts: data.uniqueContacts || 0,
                        total_signups: data.totalSignups || 0,
                        growth_percentage: data.growthWeek || 0
                    };

                    console.log('Processed Stats Data:', processedData); // Debug log
                    updateStats(processedData);
                } catch (error) {
                    console.error('Error fetching stats:', error);
                    // Set default values in case of error
                    updateStats({
                        unique_contacts: 0,
                        total_signups: 0,
                        growth_percentage: 0
                    });
                } finally {
                    setLoading(false, 'stats-section');
                }
            }

            let trendsChart = null;

            // Fetch trends data with loading state
            async function fetchTrends(period = 'weekly') {
                const chartCanvas = document.getElementById('trendsChart');
                const chartSkeleton = document.getElementById('chartSkeleton');

                try {
                    const response = await fetch(`/api/stats/trends?period=${period}`);
                    const data = await response.json();

                    // After data is loaded, prepare to show new chart
                    chartCanvas.classList.remove('hidden');
                    chartSkeleton.classList.add('hidden');

                    // Create new chart
                    const ctx = chartCanvas.getContext('2d');
                    trendsChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Sign-ups',
                                data: data.data,
                                backgroundColor: 'rgba(67, 56, 202, 0.2)',
                                borderColor: 'rgba(67, 56, 202, 1)',
                                borderWidth: 1,
                                borderRadius: 4,
                                hoverBackgroundColor: 'rgba(67, 56, 202, 0.4)'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    backgroundColor: '#1E293B',
                                    titleColor: '#E2E8F0',
                                    bodyColor: '#E2E8F0',
                                    padding: 12,
                                    displayColors: false,
                                    callbacks: {
                                        label: function(context) {
                                            return `${context.parsed.y} sign-ups`;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: {
                                        color: 'rgba(226, 232, 240, 0.1)'
                                    },
                                    ticks: {
                                        precision: 0
                                    }
                                },
                                x: {
                                    grid: {
                                        display: false
                                    }
                                }
                            }
                        }
                    });

                } catch (error) {
                    console.error('Error fetching trends:', error);
                    // Hide skeleton and show error state
                    const chartCanvas = document.getElementById('trendsChart');
                    const chartSkeleton = document.getElementById('chartSkeleton');
                    chartSkeleton.classList.add('hidden');
                    chartCanvas.classList.remove('hidden');
                }
            }

            // Fetch and display recent signups with loading state
            async function fetchRecentSignups() {
                const recentList = document.querySelector('.recent-signups');
                if (!recentList) return;

                try {
                    // 1. Render 5 skeleton ngay lập tức
                    const skeletonCount = 5;
                    const skeletons = [];
                    for (let i = 0; i < skeletonCount; i++) {
                        const skeleton = document.createElement('div');
                        skeleton.className = 'skeleton-item mb-4 flex items-center transition-opacity duration-300';
                        skeleton.style.opacity = '1';
                        skeleton.innerHTML = `
                            <div class="w-10 h-10 rounded-full skeleton"></div>
                            <div class="ml-4 flex-grow">
                                <div class="h-5 w-32 skeleton rounded mb-2"></div>
                                <div class="h-4 w-48 skeleton rounded"></div>
                            </div>
                            <div class="h-4 w-20 skeleton rounded"></div>
                        `;
                        recentList.appendChild(skeleton);
                        skeletons.push(skeleton);
                    }

                    // 2. Fetch dữ liệu
                    const response = await fetch('/api/logs/recent');
                    const data = await response.json();

                    // 3. Nếu data > skeletonCount, append thêm skeleton
                    while (skeletons.length < data.length) {
                        const skeleton = document.createElement('div');
                        skeleton.className = 'skeleton-item mb-4 flex items-center transition-opacity duration-300';
                        skeleton.style.opacity = '1';
                        skeleton.innerHTML = `
                            <div class="w-10 h-10 rounded-full skeleton"></div>
                            <div class="ml-4 flex-grow">
                                <div class="h-5 w-32 skeleton rounded mb-2"></div>
                                <div class="h-4 w-48 skeleton rounded"></div>
                            </div>
                            <div class="h-4 w-20 skeleton rounded"></div>
                        `;
                        recentList.appendChild(skeleton);
                        skeletons.push(skeleton);
                    }

                    // 4. Replace từng skeleton bằng item với stagger animation
                    data.forEach((log, index) => {
                        const skeleton = skeletons[index];
                        const color = getRandomColor();
                        const item = document.createElement('div');
                        item.className = 'flex items-center mb-4 opacity-0 transition-opacity duration-300';
                        item.innerHTML = `
                            <div class="w-10 h-10 rounded-full bg-${color}-100 dark:bg-${color}-900 flex items-center justify-center text-${color}-500 dark:text-${color}-300 font-bold">
                                ${getInitials(log.name)}
                            </div>
                            <div class="ml-4 flex-grow">
                                <p class="font-semibold">${log.name}</p>
                                <p class="text-sm text-subtext-light dark:text-subtext-dark">${log.email || log.phone_number}</p>
                            </div>
                            <p class="text-sm text-subtext-light dark:text-subtext-dark">${formatTimeAgo(log.submitted_at)}</p>
                        `;

                        setTimeout(() => {
                            skeleton.replaceWith(item);
                            item.style.opacity = '1';

                        }, index * 100); // stagger delay 200ms từng dòng
                    });

                } catch (error) {
                    console.error('Error fetching recent signups:', error);
                    recentList.innerHTML = '<div class="text-center text-subtext-light dark:text-subtext-dark">Failed to load recent sign-ups</div>';
                }
            }



            // Fetch all logs with pagination and loading state
            async function fetchAllLogs(page = 1, perPage = 10, search = '') {
                const tbody = document.getElementById('logsTableBody');
                if (!tbody) return;

                try {
                    // Clear existing rows
                    tbody.innerHTML = '';

                    // Create and add skeleton rows with unique IDs
                    for (let i = 0; i < perPage; i++) {
                        const skeletonRow = document.createElement('tr');
                        skeletonRow.id = `skeleton-row-${i}`;
                        skeletonRow.className = 'border-b border-border-light dark:border-border-dark';
                        skeletonRow.innerHTML = `
                            <td class="py-3 px-4"><div class="h-4 w-4 skeleton rounded"></div></td>
                            <td class="py-3 px-4"><div class="h-5 w-32 skeleton rounded"></div></td>
                            <td class="py-3 px-4"><div class="h-5 w-48 skeleton rounded"></div></td>
                            <td class="py-3 px-4"><div class="h-5 w-32 skeleton rounded"></div></td>
                            <td class="py-3 px-4"><div class="h-5 w-40 skeleton rounded"></div></td>
                            <td class="py-3 px-4"><div class="h-6 w-16 skeleton rounded-full"></div></td>
                        `;
                        tbody.appendChild(skeletonRow);
                    }

                    // Fetch data
                    const response = await fetch(`/api/logs?page=${page}&perPage=${perPage}&search=${search}`);
                    const data = await response.json();

                    // Replace each skeleton row with actual data one by one
                    data.data.forEach((log, index) => {
                        setTimeout(() => {
                            const skeletonRow = document.getElementById(`skeleton-row-${index}`);
                            if (skeletonRow) {
                                const actualRow = document.createElement('tr');
                                actualRow.className = 'border-b border-border-light dark:border-border-dark hover:bg-gray-50 dark:hover:bg-gray-800/50 opacity-0 transition-opacity duration-300';
                                actualRow.innerHTML = `
                                    <td class="py-3 px-4"><input class="form-checkbox rounded text-primary focus:ring-primary" type="checkbox" /></td>
                                    <td class="py-3 px-4 font-semibold">${log.name}</td>
                                    <td class="py-3 px-4">${log.email || ''}</td>
                                    <td class="py-3 px-4">${log.phone_number || ''}</td>
                                    <td class="py-3 px-4">${formatDate(log.submitted_at)}</td>
                                    <td class="py-3 px-4"><span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">New</span></td>
                                `;
                                skeletonRow.replaceWith(actualRow);
                                // Trigger reflow to ensure transition works
                                actualRow.offsetHeight;
                                actualRow.classList.add('opacity-100');
                            }
                        }, index * 100); // Stagger the replacements
                    });

                } catch (error) {
                    console.error('Error fetching logs:', error);
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="6" class="py-4 text-center text-subtext-light dark:text-subtext-dark">
                                Failed to load sign-up logs
                            </td>
                        </tr>
                    `;
                }
            }

            // Stats update function
            function updateStats(data) {
                console.log('Updating stats with data:', data); // Debug log

                const stats = {
                    'uniqueContacts': parseInt(data.unique_contacts) || 0,
                    'totalSignups': parseInt(data.total_signups) || 0,
                    'growthWeek': parseFloat(data.growth_percentage) || 0
                };


                for (const [key, value] of Object.entries(stats)) {
                    const statElement = document.getElementById(key);
                    if (statElement) {
                        const isPercent = key === 'growthWeek';
                        animateCountUp(statElement, value, 3000, isPercent);
                    }
                }
            }

            // Helper functions
            function getInitials(name) {
                return name.split(' ').map(n => n[0]).join('').toUpperCase();
            }

            function getRandomColor() {
                const colors = ['blue', 'green', 'yellow', 'purple', 'red', 'indigo'];
                return colors[Math.floor(Math.random() * colors.length)];
            }

            function formatTimeAgo(dateString) {
                const date = new Date(dateString);
                const now = new Date();
                const seconds = Math.floor((now - date) / 1000);

                if (seconds < 60) return 'just now';
                const minutes = Math.floor(seconds / 60);
                if (minutes < 60) return `${minutes} min ago`;
                const hours = Math.floor(minutes / 60);
                if (hours < 24) return `${hours} hour${hours > 1 ? 's' : ''} ago`;
                const days = Math.floor(hours / 24);
                return `${days} day${days > 1 ? 's' : ''} ago`;
            }

            function formatDate(dateString) {
                return new Date(dateString).toLocaleString();
            }

            // Event listeners for period selection
            document.querySelectorAll('[data-period]').forEach(button => {
                button.addEventListener('click', async () => {
                    const period = button.dataset.period;
                    const chartCanvas = document.getElementById('trendsChart');
                    const chartSkeleton = document.getElementById('chartSkeleton');
                    
                    // First show skeleton
                    chartSkeleton.classList.remove('hidden');
                    chartCanvas.classList.add('hidden');

                    // If there's an existing chart, destroy it before fetching new data
                    if (trendsChart) {
                        trendsChart.destroy();
                    }

                    // Update period buttons immediately
                    updatePeriodButtons(button);

                    try {
                        // Add a small delay to ensure skeleton is visible
                        await new Promise(resolve => setTimeout(resolve, 100));
                        await fetchTrends(period);
                    } catch (error) {
                        console.error('Error updating trends:', error);
                        // Show error state if needed
                        chartSkeleton.classList.add('hidden');
                        chartCanvas.classList.remove('hidden');
                    }
                });
            });

            // Function to update period button styles
            function updatePeriodButtons(activeButton) {
                // Remove active styles from all period buttons
                document.querySelectorAll('[data-period]').forEach(button => {
                    button.classList.remove('text-text-light', 'dark:text-text-dark', 'bg-gray-100', 'dark:bg-gray-700');
                    button.classList.add('text-subtext-light', 'dark:text-subtext-dark', 'hover:bg-gray-50', 'dark:hover:bg-gray-800');
                });

                // Add active styles to clicked button
                activeButton.classList.remove('text-subtext-light', 'dark:text-subtext-dark', 'hover:bg-gray-50', 'dark:hover:bg-gray-800');
                activeButton.classList.add('text-text-light', 'dark:text-text-dark', 'bg-gray-100', 'dark:bg-gray-700');
            }

            // Search with loading state
            const searchInput = document.querySelector('input[type="text"][placeholder="Search contacts..."]');
            if (searchInput) {
                let timeout;
                searchInput.addEventListener('input', (e) => {
                    clearTimeout(timeout);
                    setLoading(true, 'all-logs-section');

                    timeout = setTimeout(async () => {
                        try {
                            await fetchAllLogs(1, 10, e.target.value);
                        } finally {
                            setLoading(false, 'all-logs-section');
                        }
                    }, 300);
                });
            }

        });

        function animateCountUp(element, endValue, duration = 3000, isPercent = false) {
            let startValue = 0;
            const startTime = performance.now();

            function update(now) {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const currentValue = Math.floor(progress * endValue);

                element.textContent = isPercent ? `${currentValue}%` : currentValue.toLocaleString();

                if (progress < 1) {
                    requestAnimationFrame(update);
                } else {
                    element.textContent = isPercent ? `${endValue}%` : endValue.toLocaleString();
                }
            }

            requestAnimationFrame(update);
        }
    </script>
</body>

</html>