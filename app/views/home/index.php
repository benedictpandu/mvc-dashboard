<?php Flash::flash(); ?>
<div class="container-sm">
    <!-- Content -->
    <div class="w-full h-[93vh] lg:pl-72 z-[1] overflow-clip">
        <iframe class="noScrollIframe w-full h-full"  src="" frameborder="0" allowtransparency></iframe>
        <!-- <iframe src="http://192.168.1.20:3000/public/dashboard/52bc6d76-c745-4581-9018-e2b15990efd3" class="w-full min-h-screen" frameborder="0" allowtransparency></iframe> -->
    </div>
    <!-- End Content -->
</div>
<script>
setTimeout(function() {
var f = document.querySelectorAll('iframe')[0];
f.src = '<?= $data['metabase']; ?>';
}, 50);
</script>