<head>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="cart/js/taildwind.js"></script>
        
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>

    <style>
        body { font-family: 'Source Sans Pro', sans-serif; margin: 0; }
        #banner { background: #1a1a2e; color: white; padding: 2rem; }
    
        /* barlow-300 - latin_latin-ext_vietnamese */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Barlow';
        font-style: normal;
        font-weight: 300;
        src: url('fonts/barlow-v13-latin_latin-ext_vietnamese-300.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
        }
        /* barlow-300italic - latin_latin-ext_vietnamese */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Barlow';
        font-style: italic;
        font-weight: 300;
        src: url('fonts/barlow-v13-latin_latin-ext_vietnamese-300italic.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
        }
        /* barlow-regular - latin_latin-ext_vietnamese */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Barlow';
        font-style: normal;
        font-weight: 400;
        src: url('fonts/barlow-v13-latin_latin-ext_vietnamese-regular.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
        }
        /* barlow-italic - latin_latin-ext_vietnamese */
        @font-face {
        font-display: swap; /* Check https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display for other options. */
        font-family: 'Barlow';
        font-style: italic;
        font-weight: 400;
        src: url('fonts/barlow-v13-latin_latin-ext_vietnamese-italic.woff2') format('woff2'); /* Chrome 36+, Opera 23+, Firefox 39+, Safari 12+, iOS 10+ */
        }
    </style>
</head>

<?php $__env->startSection('title', session('nombre_empresa')); ?>

<script src="cart/js/taildwind.js"></script>







<?php $__env->startSection('css'); ?>
    
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/layouts/adminlte.blade.php ENDPATH**/ ?>