{{-- resources/views/components/chart.blade.php --}}
@props([
    'type' => 'pie',
    'labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    'data' => [12, 19, 3, 5, 2, 3],
    'colors' => null,
    'height' => '400px',
    'title' => 'Chart Title'
])

<div
    x-data="chart({
        type: '{{ $type }}',
        labels: @js($labels),
        data: @js($data),
        colors: @js($colors),
        title: '{{ $title }}'
    })"
    wire:ignore
    {{ $attributes }}
>
    <div class="chart-container" style="position: relative; height: {{ $height }}; width: 100%; border: solid 1px black">
        <canvas x-ref="canvas"></canvas>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('chart', (config) => ({
        chart: null,

        init() {
            this.$nextTick(() => {
                this.renderChart();
            });
        },

        renderChart() {
            const ctx = this.$refs.canvas;

            if (!ctx) {
                console.error('Canvas element not found');
                return;
            }

            const defaultColors = [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 159, 64, 0.8)'
            ];

            // Verificar que tenemos datos
            console.log('Chart config:', config);

            this.chart = new Chart(ctx, {
                type: config.type,
                data: {
                    labels: config.labels || [],
                    datasets: [{
                        label: config.title,
                        data: config.data || [],
                        backgroundColor: config.colors || defaultColors.slice(0, config.data?.length || 6),
                        borderWidth: 2,
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: config.title
                        }
                    }
                }
            });
        },

        // Método para actualizar datos
        updateData(newData, newLabels = null) {
            if (this.chart) {
                this.chart.data.datasets[0].data = newData;
                if (newLabels) {
                    this.chart.data.labels = newLabels;
                }
                this.chart.update();
            }
        },

        destroy() {
            if (this.chart) {
                this.chart.destroy();
            }
        }
    }));
});
</script>
