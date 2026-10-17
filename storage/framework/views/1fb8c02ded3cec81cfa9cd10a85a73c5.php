
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'pie',
    'labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    'data' => [12, 19, 3, 5, 2, 3],
    'colors' => null,
    'height' => '400px',
    'title' => 'Chart Title'
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'type' => 'pie',
    'labels' => ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    'data' => [12, 19, 3, 5, 2, 3],
    'colors' => null,
    'height' => '400px',
    'title' => 'Chart Title'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div
    x-data="chart({
        type: '<?php echo e($type); ?>',
        labels: <?php echo \Illuminate\Support\Js::from($labels)->toHtml() ?>,
        data: <?php echo \Illuminate\Support\Js::from($data)->toHtml() ?>,
        colors: <?php echo \Illuminate\Support\Js::from($colors)->toHtml() ?>,
        title: '<?php echo e($title); ?>'
    })"
    wire:ignore
    <?php echo e($attributes); ?>

>
    <div class="chart-container" style="position: relative; height: <?php echo e($height); ?>; width: 100%; border: solid 1px black">
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
                        borderColor: '#fff',
                        lineTension: 0,
                        pointRadius:4,
                        fill: true
                    },
                        // {fill: 'origin'},      // 0: fill to 'origin'
                        // {fill: '+2'},          // 1: fill to dataset 3
                        // {fill: 1},             // 2: fill to dataset 1
                        // {fill: false},         // 3: no fill
                        // {fill: '-2'},          // 4: fill to dataset 2
                        // {fill: {value: 25}}    // 5: fill to axis value 25
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                generateLabels(chart) {
                                    const dataset = chart.data.datasets[0];
                                    return chart.data.labels.map((label, i) => ({
                                        text: label,
                                        // text: label+' '+config.data[i],
                                        fillStyle: chart.data.datasets[0].backgroundColor[i],
                                        strokeStyle: chart.data.datasets[0].borderColor[i],
                                        hidden: false
                                    }));
                                }
                            }
                        },
                        // datalabels: {
                        //     color: 'red',
                        //     anchor: 'end',
                        //     align: 'top',
                        //     font: {
                        //         weight: 'bold'
                        //     },
                        //     formatter: (value) => 11 // ✅ muestra el número
                        // },
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
<?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/components/chart.blade.php ENDPATH**/ ?>