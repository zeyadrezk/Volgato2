<script src="<?php echo e(asset('assets/js/jquery-3.5.1.min.js')); ?>"></script>
<!-- feather icon js-->
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/icons/feather-icon/feather-icon.js')); ?>"></script>
<!-- Sidebar jquery-->
<script src="<?php echo e(asset('assets/js/sidebar-menu.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/config.js')); ?>"></script>
<!-- Bootstrap js-->
<script src="<?php echo e(asset('assets/js/bootstrap/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap/bootstrap.min.js')); ?>"></script>
<!-- Plugins JS start-->
<?php echo $__env->yieldPushContent('scripts'); ?>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/theme-customizer/customizer.js')); ?>"></script>
<!-- Plugin used-->

<script>
    $(document).ready(function() {
        let colorTheme = false;
        let defaultTheme = localStorage.getItem('dark');
        var dirValue = $('html').attr('dir');

        // Function to get the value of 'dir' attribute
        function getDirAttributeValue() {
            dirValue = $('html').attr('dir');
            // Perform actions based on the 'dir' value here
        }
        getDirAttributeValue();

        $("body").attr("class", defaultTheme);
        $(".mode").on("click", function() {
            colorTheme = !colorTheme;
            console.log(dirValue);
            if (dirValue == 'rtl') {
                if (colorTheme) {
                    $("body").attr("class", "rtl dark-only");
                    localStorage.setItem("dark", "dark-only");
                } else {
                    $("body").attr("class", "rtl");
                    localStorage.setItem("dark", "light");
                }
            } else {
                if (colorTheme) {
                    $("body").attr("class", "dark-only");
                    localStorage.setItem("dark", "dark-only");
                } else {
                    $("body").attr("class", "");
                    localStorage.setItem("dark", "light");
                }
            }
        });
        setInterval(getDirAttributeValue, 5000);
    });
</script><?php /**PATH D:\project\Volgato2\resources\views/layouts/admin/partials/js.blade.php ENDPATH**/ ?>